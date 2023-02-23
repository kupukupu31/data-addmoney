@extends('frontend.deposit.index')
@section('deposit_content')
    <!--payment card-->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Add Investment</h3>
                    <p class="card-title-desc"></p> <!-- description here-->
                    <form action="{{ route('user.deposit.now') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="method" class="form-label">Payment Method</label>
                                    <select name="method" class="form-select" id="gateway" required>
                                        <option selected disabled value="">SELECT GATEWAY</option>
                                        <option value="gcash">GCASH</option>
                                        <option value="paypal">PAYPAL</option>
                                        <option value="bpi">BPI</option>
                                    </select>
                                    @error('method')
                                        <p class="text-red-500 text-xs mt-2">
                                            invalid
                                        </p>
                                    @enderror
                                    <div class="invalid-feedback">
                                        Please select a gateway.
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="invest_amount" class="form-label">Amount</label>
                                    <input type="number" name="invest_amount" min="5000" step="1" max="50000"
                                        value="5000" class="form-control" value={{ old('invest_amount') }}
                                        id="validationCustom04" placeholder="0" required>
                                    @error('invest_amount')
                                        <p class="text-red-500 text-xs mt-2">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <div class="invalid-feedback">
                                        Please enter amount.
                                    </div>
                                </div>
                            </div>
                            <label for="method" class="form-label">Payment Method</label>
                            <div class="col-md-6 data" id="gcash">
                                <div class="col-md-6">
                                    <input name="profile_image" class="form-control" type="file" id="image">
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($editData->profile_image) ? url('upload/admin_images/' . $editData->profile_image) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Proceed Payment</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#gateway").on('change', function() {
                $(".data").hide();
                $("#" + $(this).val()).fadeIn(700);
            }).change();
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
