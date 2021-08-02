<?php

namespace App\Http\Controllers\Api;

use App\API\ErrorsApi;
use App\Models\Sale;
use App\Models\Seller;
use App\Repositories\SaleRepository;
use App\Repositories\SellerRepository;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SaleController extends Controller
{
    /**
     * @var Sale
     */
    private $sale;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function index()
    {
        $data = ['data' => $this->sale->all()];
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $saleData = $request->all();
            if ($saleData['sale_value'] > 0) {
                $seller = SaleRepository::findSeller($saleData['seller_id']);
                $comissionValue = SaleRepository::calculateComission($saleData['sale_value'], Seller::COMISSION);
                $saleValue = SaleRepository::convertSaleValue($saleData['sale_value']);
                SaleRepository::incrementComissionSeller($seller, $comissionValue);

                if ($saleData) {
                    Sale::create(
                        [
                            'seller_id' => $seller->id,
                            'comission_sale' => $comissionValue,
                            'sale_value' => $saleValue
                        ]
                    );
                }


                return response()->json(
                    [
                        'success' => true,
                        'msg' => 'Venda realizada com sucesso'
                    ],
                    201
                );
            }
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $salesData = SaleRepository::salesPerSeller($id);
            $salesPerSeller = $salesData->all();
            if($salesPerSeller){
                return response()->json([   $salesPerSeller,
                                            'success' => true,
                                            'msg' => 'Encontrado com sucesso'
                                        ], 201);
            }
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ErrorsApi::erroMsg($e->getMessage(), 1010));
            }
            if (empty($salesPerSeller)){
                return response()->json(ErrorsApi::erroMsg('ID não encontrado', 1010));
            }
            return response()->json(ErrorsApi::erroMsg('Erro de operação', 1010));
        }
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
            $saleData = $request->all();
            $sale = $this->sale->find($id);
            $sale->update($saleData);

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
    public function destroy($id)
    {
        //
    }

}
