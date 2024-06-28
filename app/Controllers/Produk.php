<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Produk extends Controller
{
    // URL API untuk produk dari dummyjson.com
    private $apiUrl = 'https://dummyjson.com/products';

    // Menampilkan halaman utama dengan daftar produk
    public function index()
    {
        // Mendapatkan halaman saat ini dari query parameter 'page'
        $page = $this->request->getVar('page') ?? 1;
        $limit = 50; // Jumlah produk per halaman
        $offset = ($page - 1) * $limit; // Menghitung offset berdasarkan halaman saat ini

        // Mendapatkan data produk dari API
        $response = file_get_contents("https://dummyjson.com/products?limit=$limit&skip=$offset");
        $data = json_decode($response);

        // Menghitung total halaman berdasarkan jumlah produk
        $totalProducts = $data->total;
        $totalPages = ceil($totalProducts / $limit);

        // Mengirimkan data ke view 'produk/index'
        return view('produk/index', [
            'title' => 'Semua Produk',
            'products' => $data->products,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }

    // Menampilkan halaman detail untuk produk dengan ID tertentu
    public function detail($id)
    {
        // Mendapatkan data produk dengan ID dari API
        $response = file_get_contents("https://dummyjson.com/products/$id");
        $data = json_decode($response);

        // Mengirimkan data ke view 'produk/detail'
        return view('produk/detail', [
            'title' => 'Detail Produk',
            'product' => $data
        ]);
    }

    // Fungsi private untuk membuat permintaan HTTP menggunakan CurlRequest
    private function makeRequest($url)
    {
        $client = service('curlrequest');
        $response = $client->get($url);
        return json_decode($response->getBody());
    }
}
