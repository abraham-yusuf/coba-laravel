<?php namespace Keuangan;

use BaseController, View, Input, Redirect, Pelatihan, Department, Session;

class PelatihanController extends BaseController {

	public function __construct(){
		$this->menu = array(
    			array('menu' => '',
                      'link' => ''
                      ),
    		);
    	$this->tanda = $this->tanda = array('');
	    $this->title = 'Keuangan JC & K - Konfirmasi Pembayaran';
	    $this->department = new Department();
	    $this->pelatihan = new Pelatihan();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    $data['pelatihan'] = $this->pelatihan->getDataPelatihan();
    return View::make('keuangan.pelatihan.index')
                  ->with('data', $data);
	}

	public function show($id)
	{
            $data['menu'] = $this->menu;
            $data['tanda'] = $this->tanda;
            $data['title'] = $this->title;
            $data['pelatihan'] = $this->pelatihan->getDataPelatihan($id);
            return View::make('keuangan.pelatihan.show')
                        ->with('data', $data);

	}

	public function approve($id)
	{
		$input['idpelatihan'] = $id;
		$input['status'] = 3;
		$apdet = $this->pelatihan->apdet($input);
		Session::flash('success', 'Konfirmasi Pembayaran Berhasil');
			return Redirect::to('keuangan/pelatihan');	
	}

	public function unapprove($id)
	{
		$input['idpelatihan'] = $id;
		$input['status'] = 2;
		$apdet = $this->pelatihan->apdet($input);
		Session::flash('success', 'Batal Konfirmasi Pembayaran Berhasil');
			return Redirect::to('keuangan/pelatihan');	
	}

}