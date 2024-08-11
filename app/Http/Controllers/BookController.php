<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $books = Book::all();

        return view('dashboard', compact('books'));
    }

    public function userIndex()
    {
        $books = Book::where('user_id', Auth::user()->id)->get();

        return view('userDashboard', compact('books'));
    }

    public function add()
    {
        return view('admin.addBook');
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            'judulBuku' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'file_buku' => 'required|extensions:pdf|mimes:pdf|max:2048',
            'cover_buku' => 'required|image|mimes:jpg,png,jpeg|extensions:jpg,png|max:2048',
        ]);


        $fileBuku = $request->file('file_buku');
        $fileBukuName = 'file_buku_' . '.' . $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $fileBuku->store('uploads', 'public');
        $fileBuku->storeAs('public/uploads', $fileBukuName);

        $coverBuku = $request->file('cover_buku');
        $fileCoverName = 'cover_buku' . '.' . $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $coverBuku->store('uploads', 'public');
        $coverBuku->storeAs('public/uploads', $fileCoverName);


        Book::create([
            'judul' => $request->judulBuku,
            'deskripsi' => $request->deskripsi,
            'ketegori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'file_buku' => $fileBukuName,
            'cover_buku' => $fileCoverName,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('admin.books.add')->with('success', 'Book added successfully');
    }

    public function edit(Book $book)
    {
        return view('admin.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $userId = Auth::user()->id;

        if ($book->user_id !== Auth::user()->id) {
            return redirect()->route('userDashboard')->with('error', 'You are not authorized to edit this book');
        }

        $request->validate([
            'judulBuku' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'file_buku' => 'required|extensions:pdf|mimes:pdf|max:2048',
            'cover_buku' => 'required|image|mimes:jpg,png,jpeg|extensions:jpg,png|max:2048',
        ]);

        // delete old file
        Storage::delete('public/uploads/' . $book->file_buku);
        Storage::delete('public/uploads/' . $book->cover_buku);

        $fileBuku = $request->file('file_buku');
        $fileBukuName = 'file_buku_' . '.' + $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $fileBuku->store('uploads', 'public');
        $fileBuku->storeAs('public/uploads', $fileBukuName);

        $coverBuku = $request->file('cover_buku');
        $fileCoverName = 'cover_buku' . '.' + $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $coverBuku->store('uploads', 'public');
        $coverBuku->storeAs('public/uploads', $fileCoverName);

        $book->update([
            'judul' => $request->judulBuku,
            'deskripsi' => $request->deskripsi,
            'ketegori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'file_buku' => $fileBukuName,
            'cover_buku' => $fileCoverName,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('dashboard')->with('success', 'Book deleted successfully');
    }

    public function show(Book $book)
    {
        return view('admin.show', compact('book'));
    }

    // User
    public function addUserBook()
    {
        return view('user.addBook');
    }

    public function storeUserBook(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            'judulBuku' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'file_buku' => 'required|extensions:pdf|mimes:pdf|max:2048',
            'cover_buku' => 'required|image|mimes:jpg,png,jpeg|extensions:jpg,png|max:2048',
        ]);


        $fileBuku = $request->file('file_buku');
        $fileBukuName = 'file_buku_' . '.' + $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $fileBuku->store('uploads', 'public');
        $fileBuku->storeAs('public/uploads', $fileBukuName);

        $coverBuku = $request->file('cover_buku');
        $fileCoverName = 'cover_buku' . '.' + $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $coverBuku->store('uploads', 'public');
        $coverBuku->storeAs('public/uploads', $fileCoverName);


        Book::create([
            'judul' => $request->judulBuku,
            'deskripsi' => $request->deskripsi,
            'ketegori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'file_buku' => $fileBukuName,
            'cover_buku' => $fileCoverName,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('userDashboard')->with('success', 'Book added successfully');
    }

    public function editUserBook(Book $book)
    {
        if ($book->user_id !== Auth::user()->id) {
            return redirect()->route('userDashboard')->with('error', 'You are not authorized to edit this book');
        }

        return view('user.edit', compact('book'));
    }

    public function updateUserBook(Request $request, Book $book)
    {
        $userId = Auth::user()->id;

        if ($book->user_id !== Auth::user()->id) {
            return redirect()->route('userDashboard')->with('error', 'You are not authorized to edit this book');
        }

        $request->validate([
            'judulBuku' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'file_buku' => 'required|extensions:pdf|mimes:pdf|max:2048',
            'cover_buku' => 'required|image|mimes:jpg,png,jpeg|extensions:jpg,png|max:2048',
        ]);

        // delete old file
        Storage::delete('public/uploads/' . $book->file_buku);
        Storage::delete('public/uploads/' . $book->cover_buku);

        $fileBuku = $request->file('file_buku');
        $fileBukuName = 'file_buku_' . '.' . $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $fileBuku->store('uploads', 'public');
        $fileBuku->storeAs('public/uploads', $fileBukuName);

        $coverBuku = $request->file('cover_buku');
        $fileCoverName = 'cover_buku' . '.' . $userId . time() . '.' . $fileBuku->getClientOriginalExtension();
        // $coverBuku->store('uploads', 'public');
        $coverBuku->storeAs('public/uploads', $fileCoverName);

        $book->update([
            'judul' => $request->judulBuku,
            'deskripsi' => $request->deskripsi,
            'ketegori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'file_buku' => $fileBukuName,
            'cover_buku' => $fileCoverName,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('userDashboard')->with('success', 'Book updated successfully');
    }

    public function destroyUserBook(Book $book)
    {
        if ($book->user_id !== Auth::user()->id) {
            return redirect()->route('userDashboard')->with('error', 'You are not authorized to delete this book');
        }

        $book->delete();

        return redirect()->route('userDashboard')->with('success', 'Book deleted successfully');
    }

    public function showUserBook(Book $book)
    {
        return view('user.show', compact('book'));
    }
}
