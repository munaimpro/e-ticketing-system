@extends('layouts.app')

@section('content')

<!-- details section start -->
<section id="details" style="background: url(asset/images/cover2.jpg) no-repeat center/cover fixed;">
    <div class="container">
      <form action="">
        <div class="row bus-bg">
            <!-- <div class="details-content"> -->
            <div class="col-lg-3">
                <div class="leaving">
                        <level>Leaving from:*</level>
                        <select name="from" id="from" class="form-select mt-2">
                            <option selected>Choose...</option>
                            @foreach($busStops as $stopName)
                            <option value="{{ $stopName }}">{{ $stopName }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="leaving">
                        <level>Going to:*</level>
                        <select name="to" id="to" class="form-select mt-2">
                            <option selected>Choose...</option>
                            @foreach($busStops as $stopName)
                            <option value="{{ $stopName }}">{{ $stopName }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="leaving">
                        <level>Departing date:*</level>
                        <input type="date"  id="doj" name = "doj" class="form-control mt-2" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="search-btn">
                    <button class="btn ">Search</button>
                </div>
            </div>
        </div>
        <!-- </div> -->
        </form>
    </div>
</section>
<!-- details section end -->
<!-- details-info -->
<section id="details-info" class="mt-5">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="details-info">
                <table class="table table-bordered">
                    <thead>
                        <tr class="thead">
                            <th>Coach No</th>
                            <th>Starting Counter</th>
                            <th>Departing Time</th>
                            <th>End Counter</th>
                            <th>Arrival Time</th>
                            <th>Coach Type</th>
                            <th>Fare</th>
                            <th>Seats Available</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($busInfoResults->isEmpty())
                            <tr>
                                <td class="text-center" colspan="9">No buses found for the selected criteria.</td>
                            </tr>
                        @else
                            @foreach ($busInfoResults as $bus)
                                <tr>
                                    <td>{{ $bus->coach_name }}</td>
                                    <td>{{ $bus->boarding_point }}</td>
                                    <td>{{ $bus->boarding_time }}</td>
                                    <td>{{ $bus->dropping_point }}</td>
                                    <td>{{ $bus->dropping_time }}</td>
                                    <td>{{ $bus->coach_type }}</td>
                                    <td>{{ $bus->fare }}</td>
                                    <td>{{ $bus->total_seats - $total_ticket_sold }} / {{ $bus->total_seats }}</td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</section>
<!-- details-info -->

<!-- Laravel variable to check if the user is logged in -->
{{-- <script>
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    </script>

    <script>
        document.getElementById('buyNowForm').addEventListener('submit', function(event) {
            if (!isLoggedIn) {
                event.preventDefault();
                window.location.href = "{{ route('login') }}"; // Replace with the actual login URL
            }
        });
    </script> --}}

@endsection
