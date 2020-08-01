<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_resultRequest;
use App\Http\Requests\Updatewc_resultRequest;
use App\Repositories\wc_resultRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class wc_resultController extends AppBaseController
{
    /** @var  wc_resultRepository */
    private $wcResultRepository;

    public function __construct(wc_resultRepository $wcResultRepo)
    {
        $this->wcResultRepository = $wcResultRepo;
    }

    /**
     * Display a listing of the wc_result.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wcResults = $this->wcResultRepository->all();

        return view('wc_results.index')
            ->with('wcResults', $wcResults);
    }

    /**
     * Show the form for creating a new wc_result.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_results.create');
    }

    /**
     * Store a newly created wc_result in storage.
     *
     * @param Createwc_resultRequest $request
     *
     * @return Response
     */
    public function store(Createwc_resultRequest $request)
    {
        $input = $request->all();

        $wcResult = $this->wcResultRepository->create($input);

        Flash::success('Wc Result saved successfully.');

        return redirect(route('wcResults.index'));
    }

    /**
     * Display the specified wc_result.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        return view('wc_results.show')->with('wcResult', $wcResult);
    }

    /**
     * Show the form for editing the specified wc_result.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        return view('wc_results.edit')->with('wcResult', $wcResult);
    }

    /**
     * Update the specified wc_result in storage.
     *
     * @param int $id
     * @param Updatewc_resultRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_resultRequest $request)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        $wcResult = $this->wcResultRepository->update($request->all(), $id);

        Flash::success('Wc Result updated successfully.');

        return redirect(route('wcResults.index'));
    }

    /**
     * Remove the specified wc_result from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcResult = $this->wcResultRepository->find($id);

        if (empty($wcResult)) {
            Flash::error('Wc Result not found');

            return redirect(route('wcResults.index'));
        }

        $this->wcResultRepository->delete($id);

        Flash::success('Wc Result deleted successfully.');

        return redirect(route('wcResults.index'));
    }
}
