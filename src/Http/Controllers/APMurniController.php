<?php namespace Bantenprov\APMurni\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\APMurni\Facades\APMurni;

/* Models */
use Bantenprov\APMurni\Models\Bantenprov\APMurni\APMurni as PdrbModel;
use Bantenprov\APMurni\Models\Bantenprov\APMurni\Province;
use Bantenprov\APMurni\Models\Bantenprov\APMurni\Regency;

/* etc */
use Validator;

/**
 * The APMurniController class.
 *
 * @package Bantenprov\APMurni
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APMurniController extends Controller
{

    protected $province;

    protected $regency;

    protected $ap_murni;

    public function __construct(Regency $regency, Province $province, PdrbModel $ap_murni)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->ap_murni     = $ap_murni;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $ap_murni = $this->ap-murni->find($id);

        return response()->json([
            'negara'    => $ap-murni->negara,
            'province'  => $ap-murni->getProvince->name,
            'regencies' => $ap-murni->getRegency->name,
            'tahun'     => $ap-murni->tahun,
            'data'      => $ap-murni->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->ap-murni->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->ap-murni->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

