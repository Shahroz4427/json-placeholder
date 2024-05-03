<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{

    public function createCustomer(array $validatedData): Customer
    {
        $customer = Customer::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'website' => $validatedData['website']
        ]);

        $address = $customer->address()->create([
            'street' => $validatedData['address']['street'],
            'suite' => $validatedData['address']['suite'],
            'city' => $validatedData['address']['city'],
            'zipcode' => $validatedData['address']['zipcode']
        ]);

        $address->geo()->create([
            'lat' => $validatedData['address']['geo']['lat'],
            'lng' => $validatedData['address']['geo']['lng']
        ]);

        $customer->company()->create([
            'name' => $validatedData['company']['name'],
            'catch_phrase' => $validatedData['company']['catch_phrase'],
            'bs' => $validatedData['company']['bs']
        ]);

        $customer->load(['address', 'company', 'address.geo']);

        return $customer;
    }


    public function updateCustomer(Customer $customer, array $validatedData): void
    {
        $customer->update([
            'name' => $validatedData['name'] ?? $customer->name,
            'username' => $validatedData['username'] ?? $customer->username,
            'email' => $validatedData['email'] ?? $customer->email,
            'phone' => $validatedData['phone'] ?? $customer->phone,
            'website' => $validatedData['website'] ?? $customer->website
        ]);

        if (isset($validatedData['address'])) {
            $customer->address()->updateOrCreate([], [
                'street' => $validatedData['address']['street'] ?? $customer->address->street,
                'suite' => $validatedData['address']['suite'] ?? $customer->address->suite,
                'city' => $validatedData['address']['city'] ?? $customer->address->city,
                'zipcode' => $validatedData['address']['zipcode'] ?? $customer->address->zipcode
            ]);

            if (isset($validatedData['address']['geo'])) {
                $customer->address->geo()->updateOrCreate([], [
                    'lat' => $validatedData['address']['geo']['lat'] ?? $customer->address->geo->lat,
                    'lng' => $validatedData['address']['geo']['lng'] ?? $customer->address->geo->lng
                ]);
            }
        }

        if (isset($validatedData['company'])) {
            $customer->company()->updateOrCreate([], [
                'name' => $validatedData['company']['name'] ?? $customer->company->name,
                'catch_phrase' => $validatedData['company']['catch_phrase'] ?? $customer->company->catch_phrase,
                'bs' => $validatedData['company']['bs'] ?? $customer->company->bs
            ]);
        }
    }

}
