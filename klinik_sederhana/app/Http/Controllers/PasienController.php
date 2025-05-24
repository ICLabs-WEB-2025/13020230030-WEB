<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Label\Label;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P'
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P'
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }

    public function qrcode(Pasien $pasien)
    {
        $data = [
            'id' => $pasien->id,
            'nama' => $pasien->nama,
            'no_rm' => $pasien->no_rm,
            'tanggal_lahir' => $pasien->tanggal_lahir,
        ];

        $qrCode = QrCode::create(json_encode($data))
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return response($result->getString())
            ->header('Content-Type', $result->getMimeType());
    }
} 