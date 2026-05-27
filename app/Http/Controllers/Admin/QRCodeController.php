<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QrCode as QrCodeModel;
use Illuminate\Support\Str;

class QRCodeController extends Controller
{
    public function index(Request $request)
    {
        $query = QrCodeModel::latest();
        
        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('type', $request->type);
        }
        
        $qrcodes = $query->get();
        return view('admin.qrcode.index', compact('qrcodes'));
    }

    public function create()
    {
        return view('admin.qrcode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:better_luck,one_time_winner,multiple_winner',
        ]);

        $code = Str::random(12);
        while (QrCodeModel::where('code', $code)->exists()) {
            $code = Str::random(12);
        }
        
        $imagePath = null;
        if ($request->hasFile('image') && $request->type !== 'better_luck') {
            $imagePath = $request->file('image')->store('qrcodes/images', 'public');
        }
        
        // Generate and save physical SVG
        $url = route('scan.result', ['code' => $code]);
        $svg = QrCode::size(300)
            ->style('square')
            ->eye('square')
            ->eyeColor(0, 245, 158, 11, 245, 158, 11)
            ->eyeColor(1, 245, 158, 11, 245, 158, 11)
            ->eyeColor(2, 245, 158, 11, 245, 158, 11)
            ->color(0, 0, 0)
            ->margin(1)
            ->format('svg')
            ->errorCorrection('H')
            ->generate($url);
            
        \Illuminate\Support\Facades\Storage::disk('public')->put("qrcodes/{$code}.svg", $svg);

        QrCodeModel::create([
            'code' => $code,
            'title' => $request->title,
            'type' => $request->type,
            'qr_path' => "qrcodes/{$code}.svg", // Save path
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.qrcodes.index')->with('success', 'QR Code generated and saved successfully!');
    }

    public function edit($id)
    {
        $qrcode = QrCodeModel::findOrFail($id);
        return view('admin.qrcode.edit', compact('qrcode'));
    }

    public function update(Request $request, $id)
    {
        $qrcode = QrCodeModel::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:better_luck,one_time_winner,multiple_winner',
        ]);

        $imagePath = $qrcode->image_path;
        
        if ($request->hasFile('image') && $request->type !== 'better_luck') {
            if ($imagePath && \Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('qrcodes/images', 'public');
        } elseif ($request->type === 'better_luck') {
            if ($imagePath && \Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($imagePath);
            }
            $imagePath = null;
        }

        $qrcode->update([
            'title' => $request->title,
            'type' => $request->type,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.qrcodes.index')->with('success', 'QR Code updated successfully!');
    }

    public function download($id)
    {
        $qrRecord = QrCodeModel::findOrFail($id);
        $filePath = "qrcodes/{$qrRecord->code}.svg";
        
        // Return physical file if it exists
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($filePath)) {
            return \Illuminate\Support\Facades\Storage::disk('public')->download($filePath, "qrcode-{$qrRecord->code}.svg");
        }
        
        // Fallback generation (just in case)
        $url = route('scan.result', ['code' => $qrRecord->code]);
        $svg = QrCode::size(300)
            ->style('square')
            ->eye('square')
            ->eyeColor(0, 245, 158, 11, 245, 158, 11)
            ->eyeColor(1, 245, 158, 11, 245, 158, 11)
            ->eyeColor(2, 245, 158, 11, 245, 158, 11)
            ->color(0, 0, 0)
            ->margin(1)
            ->format('svg')
            ->errorCorrection('H')
            ->generate($url);

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Content-Disposition', 'attachment; filename="qrcode-'.$qrRecord->code.'.svg"');
    }

    public function generateQRCode()
    {
        $url = route('scan.result');
        return $qrCodePNG = QrCode::size(300)
            ->style('square')
            ->eye('square')
            ->eyeColor(0, 245, 158, 11, 245, 158, 11)
            ->eyeColor(1, 245, 158, 11, 245, 158, 11)
            ->eyeColor(2, 245, 158, 11, 245, 158, 11)
            ->color(0, 0, 0)
            ->margin(1)
            ->format('svg')
            ->errorCorrection('H') // High error correction level
            ->generate($url);
    }

    public function betterLuck()
    {
        return view('frontend.QR.better-luck');
    }
}
