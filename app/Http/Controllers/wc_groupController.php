<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createwc_groupRequest;
use App\Http\Requests\Updatewc_groupRequest;
use App\Repositories\wc_groupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class wc_groupController extends AppBaseController
{
    /** @var  wc_groupRepository */
    private $wcGroupRepository;

    public function __construct(wc_groupRepository $wcGroupRepo)
    {
        $this->wcGroupRepository = $wcGroupRepo;
    }

    /**
     * Display a listing of the wc_group.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wcGroups = $this->wcGroupRepository->all();

        return view('wc_groups.index')
            ->with('wcGroups', $wcGroups);
    }

    /**
     * Show the form for creating a new wc_group.
     *
     * @return Response
     */
    public function create()
    {
        return view('wc_groups.create');
    }

    /**
     * Store a newly created wc_group in storage.
     *
     * @param Createwc_groupRequest $request
     *
     * @return Response
     */
    public function store(Createwc_groupRequest $request)
    {
        $input = $request->all();

        $wcGroup = $this->wcGroupRepository->create($input);

        Flash::success('Wc Group saved successfully.');

        return redirect(route('wcGroups.index'));
    }

    /**
     * Display the specified wc_group.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wcGroup = $this->wcGroupRepository->find($id);

        if (empty($wcGroup)) {
            Flash::error('Wc Group not found');

            return redirect(route('wcGroups.index'));
        }

        return view('wc_groups.show')->with('wcGroup', $wcGroup);
    }

    /**
     * Show the form for editing the specified wc_group.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wcGroup = $this->wcGroupRepository->find($id);

        if (empty($wcGroup)) {
            Flash::error('Wc Group not found');

            return redirect(route('wcGroups.index'));
        }

        return view('wc_groups.edit')->with('wcGroup', $wcGroup);
    }

    /**
     * Update the specified wc_group in storage.
     *
     * @param int $id
     * @param Updatewc_groupRequest $request
     *
     * @return Response
     */
    public function update($id, Updatewc_groupRequest $request)
    {
        $wcGroup = $this->wcGroupRepository->find($id);

        if (empty($wcGroup)) {
            Flash::error('Wc Group not found');

            return redirect(route('wcGroups.index'));
        }

        $wcGroup = $this->wcGroupRepository->update($request->all(), $id);

        Flash::success('Wc Group updated successfully.');

        return redirect(route('wcGroups.index'));
    }

    /**
     * Remove the specified wc_group from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wcGroup = $this->wcGroupRepository->find($id);

        if (empty($wcGroup)) {
            Flash::error('Wc Group not found');

            return redirect(route('wcGroups.index'));
        }

        $this->wcGroupRepository->delete($id);

        Flash::success('Wc Group deleted successfully.');

        return redirect(route('wcGroups.index'));
    }
}
