<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use App\Model\Ted;

class TedController extends Controller
{   
    /**
	 * @var Ted
	 */
	private $teds;

	public function __construct(Ted $ted)
	{
		$this->teds = $ted;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {   
        $teds = $this->teds->paginate(15);

        $now = new Carbon();
        $sumMonth = $this->agendamentosMes();
        $mes = $this->getMesExtenso($now->format('m'));

        return view('index', compact(['teds', 'sumMonth', 'mes']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agendamentosMes() 
    {   
        $now = new Carbon();
        $dataIni = Carbon::createFromDate($now->format('Y'), $now->format('m'), 01);
        $dataFim = Carbon::createFromDate($now->format('Y'), $now->format('m'), 31);

        $teds = $this->teds::where('date', '>=', $dataIni)
                           ->where('date', '<=', $dataFim)
                           ->get();
        $sum = 0.00;
        foreach($teds as $ted) {
            $sum += $ted->amount;
        }
        return $sum ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = \App\Model\Bank::all();
        $purposes = \App\Model\Purpose::all();
        $accountTypes = \App\Model\AccountType::all();
	    return view('create', compact(['banks', 'purposes', 'accountTypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $dados = $_POST;

        $receiver = \App\Model\Receiver::create($dados['receiver']);
        $sender = \App\Model\Sender::create($dados['sender']);
        
        $data = str_replace("/", "-", $dados['ted']['date']);
        $data = date('Y-m-d', strtotime($data));

        $ted = \App\Model\Ted::create([
            "purpose_id" => $dados['ted']['purpose_id'],
            "receiver_id"=> $receiver->id,
            "sender_id"=> $sender->id,
            'description' => $dados['ted']['description'], 
            'amount' => $dados['ted']['amount'], 
            'tax'=> $dados['ted']['tax'] , 
            'date'=> $data
        ]);

        return response()->json(['success'=>'Ted agendada com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ted
     * @return \Illuminate\Http\Response
     */
    public function destroy($ted)
    {
        $ted = $this->teds->find($ted);
	    $ted->delete();

        return response()->json(['success'=>'Ted deletada com sucesso']);
    }

    private function getMesExtenso($mes){
        $mes_extenso = array(
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Marco',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Novembro',
            '10' => 'Setembro',
            '11' => 'Outubro',
            '12' => 'Dezembro'
        );

        return $mes_extenso[$mes];
    }
    
}
