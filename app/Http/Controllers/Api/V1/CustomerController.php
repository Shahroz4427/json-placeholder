<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): CustomerCollection
    {
        return new CustomerCollection(Customer::with(['address', 'company', 'address.geo'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request): CustomerResource
    {
        return new CustomerResource($this->customerService->createCustomer($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): CustomerResource
    {
        return new CustomerResource($customer->load(['address', 'company', 'address.geo']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, Customer $customer)
    {
        $this->customerService->updateCustomer($customer, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
    }


}
