<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_matchRequest;
use App\Http\Requests\Updatewc_matchRequest;
use App\Repositories\wc_matchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class wc_matchController extends AppBaseController
{
    /** @var  wc_matchRepository */
    private $wcMatchRepository;

    public function __construct(wc_matchRepository $wcMatchRepo)
    {
        $this->wcMatchRepository = $wcMatchRepo;
    }

    /**
     * Display a listing of the wc_match.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wcMatches = $this->wcMatchRepository->all();

        return view('wc_matches.index')
            ->with('wcMatches', $wcMatches);
    }

    /**
     * Show the form for creating a new wc_match.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_matches.create');
    }

    /**
     * Store a newly created wc_match in storage.
     *
     * @param Createwc_matchRequest $request
     *
     * @return Response
     */
    public function store(Createwc_matchRequest $request)
    {
        $input = $request->all();

        $wcMatch = $this->wcMatchRepository->create($input);

        Flash::success('Wc Match saved successfully.');

        return redirect(route('wcMatches.index'));
    }

    /**
     * Display the specified wc_match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcMatch = $this->wcMatchRepository->find($id);

        if (empty($wcMatch)) {
            Flash::error('Wc Match not found');

            return redirect(route('wcMatches.index'));
        }

        return view('wc_matches.show')->with('wcMatch', $wcMatch);
    }

    /**
     * Show the form for editing the specified wc_match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcMatch = $this->wcMatchRepository->find($id);

        if (empty($wcMatch)) {
            Flash::error('Wc Match not found');

            return redirect(route('wcMatches.index'));
        }

        return view('wc_matches.edit')->with('wcMatch', $wcMatch);
    }

    /**
     * Update the specified wc_match in storage.
     *
     * @param int $id
     * @param Updatewc_matchRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_matchRequest $request)
    {
        $wcMatch = $this->wcMatchRepository->find($id);

        if (empty($wcMatch)) {
            Flash::error('Wc Match not found');

            return redirect(route('wcMatches.index'));
        }

        $wcMatch = $this->wcMatchRepository->update($request->all(), $id);

        Flash::success('Wc Match updated successfully.');

        return redirect(route('wcMatches.index'));
    }

    /**
     * Remove the specified wc_match from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcMatch = $this->wcMatchRepository->find($id);

        if (empty($wcMatch)) {
            Flash::error('Wc Match not found');

            return redirect(route('wcMatches.index'));
        }

        $this->wcMatchRepository->delete($id);

        Flash::success('Wc Match deleted successfully.');

        return redirect(route('wcMatches.index'));
    }
}
