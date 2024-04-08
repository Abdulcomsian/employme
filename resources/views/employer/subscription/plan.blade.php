<div class="col-lg-12 col-md-12">
    <div class="pricing-card-one border-0 mt-25">
        <div class="pack-name">{{$plan->title}}</div>
        <div class="price fw-500"><sub>₩</sub> {{$plan->price/1000}}K<!--<sup>99</sup>--></div>
        <ul class="style-none">
            <li>{{$plan->duration}} {{$plan->duration > 1 ? 'Months' : 'Month'}} Duration </li>
            <li>{{$plan->allowed_jobs > 1 ? $plan->allowed_jobs.' '.'job posts' : 'Only One Job Post' }}</li>
            <li>Job post live for 130 days </li>
        </ul>
    </div>
</div>