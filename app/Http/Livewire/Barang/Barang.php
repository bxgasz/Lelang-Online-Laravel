<?php

namespace App\Http\Livewire\Barang;

use App\Models\Barang as ModelsBarang;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Barang extends Component
{   
    use WithFileUploads;

    public $nama,$harga,$deskripsi,$idb;
    public $gambar = [];

    public $delImageid = [];
    public $uploaded_gambar = [];

    protected $rules = [
        'nama' => 'required',
        'harga' => 'required',
        'deskripsi' => 'required',
        'gambar.*' => 'required|mimes:png,jpg,jpeg',
        'gambar' => 'required|max:4',
    ];

    protected $message = [
        'gambar.max' => 'upload limit is 4 image',
    ];

    protected $listeners = ['editData' => 'editData','delImage' => 'delImage']; 

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,$this->rules,$this->message);
    }
    
    public function saveData()
    {
        $this->validate($this->rules,$this->message);

        // $barang = new ModelsBarang();
        // $barang->nama_barang = $this->nama;
        // $barang->harga_awal = $this->harga;
        // $barang->deskripsi_barang = $this->deskripsi;
        // $barang->status = 'ready';

        // $barang->save();

        // foreach ($this->gambar as $images) {
        //     $image = new Image();
        //     $nama = date('Y-m-dHis') .'.'. $images->getClientOriginalName();
        //     $images->storeAs('img', $nama);

        //     $image->id_barang = $barang->id_barang;
        //     $image->image = "img/$nama";

        //     $image->save();
        // }

        DB::beginTransaction();

        try {
            $barang = new ModelsBarang();
            $barang->nama_barang = $this->nama;
            $barang->harga_awal = $this->harga;
            $barang->deskripsi_barang = $this->deskripsi;
            $barang->status = 'ready';

            $barang->save();

            foreach ($this->gambar as $images) {
                $image = new Image();
                $nama = date('Y-m-dHis') .'.'. $images->getClientOriginalName();
                $images->storeAs('img', $nama);

                $image->id_barang = $barang->id_barang;
                $image->image = "img/$nama";

                $image->save();
            }

            DB::commit();

            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('errors');
        }

        $this->reset();
    }

    public function editData($id)
    {
        $barang = ModelsBarang::find($id);
        $gambar = Image::where('id_barang', $barang->id_barang)->get();

        $this->idb = $id;

        $this->nama = $barang->nama_barang;
        $this->harga = $barang->harga_awal;
        $this->deskripsi = $barang->deskripsi_barang;
        $this->uploaded_gambar = $gambar;
    }

    public function delImage($id)
    {
        array_push($this->delImageid,$id);
    }

    public function updateData()
    {
        if (count($this->uploaded_gambar) > 0) {
            $this->validate([
                'nama' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
            ]);
        }else{
            $this->validate();
        }

        $barang = ModelsBarang::find($this->idb);
        $barang->nama_barang = $this->nama;
        $barang->harga_awal = $this->harga;
        $barang->deskripsi_barang = $this->deskripsi;
        
        $barang->update();

        if ($this->gambar != null || $this->delImageid != null) {
            $delImage = array_unique($this->delImageid);
            foreach ($delImage as $id) {
                $image = Image::find($id);
                Storage::disk('local')->delete('public/'.$image->image);
                $image->delete();
            }

            foreach ($this->gambar as $images) {
                $image = new Image();
                $nama = date('Y-m-dHis') .'.'. $images->getClientOriginalName();
                $images->storeAs('img', $nama);
    
                $image->id_barang = $barang->id_barang;
                $image->image = "img/$nama";
    
                $image->save();
            }
        }

        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('success');
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.barang.barang');
    }
}
