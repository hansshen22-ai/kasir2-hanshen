<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JurusanController extends Controller
{
    /**
     * Menampilkan semua data jurusan
     */
    public function index()
    {
        $jurusans = Jurusan::latest()->get();

        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Menampilkan form tambah jurusan
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Menyimpan data jurusan
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_jurusan' => [
                'required',
                'string',
                'max:20',
                'unique:jurusan,kode_jurusan',
            ],
            'nama_jurusan' => [
                'required',
                'string',
                'max:100',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:255',
            ],
            'status' => [
                'required',
                Rule::in(['aktif', 'nonaktif']),
            ],
        ]);

        Jurusan::create($validated);

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail jurusan
     */
    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Menampilkan form edit jurusan
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Mengupdate data jurusan
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'kode_jurusan' => [
                'required',
                'string',
                'max:20',
                Rule::unique('jurusan', 'kode_jurusan')
                    ->ignore($jurusan->id),
            ],
            'nama_jurusan' => [
                'required',
                'string',
                'max:100',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:255',
            ],
            'status' => [
                'required',
                Rule::in(['aktif', 'nonaktif']),
            ],
        ]);

        $jurusan->update($validated);

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Menghapus data jurusan
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}