@extends('user.user_dashboard')
@section('user')
<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ Auth::user()->role }} Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">M30 Investments</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Payouts</p>
                                <h4 class="mb-2">1452</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                            
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Investments</p>
                                <h4 class="mb-2">938</h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Investors</p>
                                <h4 class="mb-2">8246</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Investors</p>
                                <h4 class="mb-2">29670</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Recent Transactions</h4>
                        <!--description here -->
                        <p class="card-title-desc">
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>DESCRIPTION</th>
                                <th>TRANSACTIONS ID</th>
                                <th>DATE</th>
                                <th>AMOUNT</th>
                                <th>STATUS</th>
                                <th>GATEWAY</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($transactdata as $trans)
                            <tr>
                                <td>Deposit With {{ $trans->method }}</td>
                                <td>TRX{{ \Carbon\Carbon::parse($trans->created_at)->format('time') }}{{ $trans->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($trans->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $trans->invest_amount }}</td>
                                <td>{{ $trans->type }}</td>
                                <td>{{ $trans->method }}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    
</div>

{{-- ADD MONEY FORM --}}

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h1 class="mb-sm-0 ">Deposit</h1>

                        

                    </div>
                </div>
            </div> --}}
            <!-- end page title -->
            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
      
                <!-- Welcome banner -->
                {{-- <x-dashboard.deposit-banner /> --}}
                <section class="mt-10">
                <form action="/user/addmoney" method="POST" class=" py-8 w-full max-w-9xl mx-auto">
                   @csrf
          
                        <!-- Select -->
                        <div>
                            <h2 class="text-2xl text-slate-800 font-bold mb-6">Deposit</h2>
                            <label  for="method" class="block text-sm font-medium mb-1">Country</label>
                            <select name="method" class="form-select">
                                <option value="Paypal" {{old('method') == "Paypal" ? 'selected' : ''}}>Paypal</option>
                                <option value="Bpi"  {{old('method') == "Bpi" ? 'selected' : ''}}>Bpi</option>
                                <option value="Gcash"  {{old('method') == "Gcash" ? 'selected' : ''}}>Gcash</option>
                            </select>
                            @error('method')
                            <p class="text-red-500 text-xs mt-2">
                               invalid
                         </p>
                            @enderror
                        </div>
          
                        <!-- Start -->
                        <div>
                            <label for="invest_amount" class="block text-sm font-medium mb-1" for="mandatory">Enter Amount <span class="text-rose-500">*</span></label>
                            <input type="number" name="invest_amount" class="form-input w-full"  autocomplete="off" value={{old('invest_amount')}}>
                            @error('invest_amount')
                            <p class="text-red-500 text-xs mt-2">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
          
                        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transitionduration-200 mt-5 p-2" type="submit">Proceed Payment</button>
                  
                    </form>
                 </section>
             
                        <!-- End -->
          
          
          
                        <!-- Table Row with Accordion -->
                        <div>
                            <h2 class="text-2xl text-slate-800 font-bold mb-6">Review Details</h2>
                            <!-- Start -->
                            <div class="rounded-sm border border-slate-200">
                                <div class="overflow-x-auto">
                                    <table class="table-auto w-full divide-y divide-slate-200">
                                        <!-- Table body -->
                                        <tbody class="text-sm" x-data="{ open: false }">
                                            <!-- Row -->
                                            <tr>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="flex items-center text-slate-800">
                                                        <div class="font-medium text-slate-800">Amount</div>
                                                    </div>
                                                </td>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="text-left font-medium text-emerald-500">$129.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="flex items-center text-slate-800">
                                                        <div class="font-medium text-slate-800">Charge</div>
                                                    </div>
                                                </td>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="text-left font-medium text-emerald-500">10%</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="flex items-center text-slate-800">
                                                        <div class="font-medium text-slate-800">Payment Method</div>
                                                    </div>
                                                </td>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="text-left font-medium text-emerald-500">$12.9</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="flex items-center text-slate-800">
                                                        <div class="font-medium text-slate-800">Total</div>
                                                    </div>
                                                </td>
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                    <div class="text-left font-medium text-emerald-500">$129.00</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End -->
                        </div>
          
            </div>
           
    
</div>
</div>
@endsection