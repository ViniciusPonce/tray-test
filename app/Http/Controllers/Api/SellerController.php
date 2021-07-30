<?php

namespace App\Http\Controllers\Api;
use App\API\ErrorsApi;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Routing\Controller;

class SellerController extends Controller
{
    /**
     * @var Seller
     */
    private $seller;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Seller $seller)
    {
        $this->seller = $seller;
    }

    public function index(Request $request)
    {
        $data = ['data' => $this->seller->all()];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $sellerData = $request->all();
            $this->seller->create($sellerData);

            return response()->json(['msg' => 'Vendendor criado com sucesso'], 201);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ErrorsApi::erroMsg($e->getMessage(), 1010));
            }
            return response()->json(ErrorsApi::erroMsg('Erro de operação', 1010));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $id)
    {
        $data = ['data' => $id];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $sellerData = $request->all();
            $seller = $this->seller->find($id);
            $seller->update($sellerData);

            return response()->json(['msg' => 'Vendendor atualizado com sucesso'], 200);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ErrorsApi::erroMsg($e->getMessage(), 1011));
            }
            return response()->json(ErrorsApi::erroMsg('Erro de operação', 1011));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $id)
    {
        try {
            $seller = $id;
            $seller->delete();

            return response()->json(['msg' => 'Vendendor deletado com sucesso'], 200);

        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ErrorsApi::erroMsg($e->getMessage(), 1012));
            }
            return response()->json(ErrorsApi::erroMsg('Erro de operação', 1012));
        }
    }
}
