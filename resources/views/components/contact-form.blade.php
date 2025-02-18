<div>
    <div class="contact-form text-center p-4 mb-3" id="contact-form-modal">
        <h3 class="h5 head fw-bold">{{__('We Are Here To Help You')}}</h3>
        <p class="title">{{__("Let's Get In Touch")}}</p>
        <form action="{{route('contact-us')}}" method="post"
              class="form-group mt-3 mb-0 contact-message-form">
            @csrf
            <input type="text" name="name" class="custom-input" placeholder="{{__('Name')}}*"
                   aria-label="Name*">
            <div class="d-flex">
                <select name="phone_code" class="custom-input">
                    @foreach($countries as $country)
                        <option @selected( $country->iso_code_2 === 'TR') value="{{$country->phonecode}}">
                            ({{'+'. $country->phonecode . ' ' . $country->iso_code_2 }})
                        </option>
                    @endforeach
                </select>
                <input type="text" name="phone_number" class="custom-input" value="{{old('phone')}}"
                       placeholder="{{__('Phone')}}" aria-label="Phone">
            </div>
            <input type="email" name="email" value="{{old('email')}}" class="custom-input" placeholder="{{__('Email')}}"
                   aria-label="E-mail">
            <input type="text" name="subject" value="{{old('subject')}}" class="custom-input"
                   placeholder="{{__('Subject')}}"
                   aria-label="{{__('Subject')}}">
            <button type="submit" class="btn btn-main-color mx-1 btn-block w-100">
                {{__('Submit')}}
            </button>
        </form>
    </div>
    <div class="contact-form ">
        <a href="{{route('citizenship')}}">
            <h3 class="h5 p-4 text-main-color text-center">{{__('Turkish Citizenship And How To Obtain It')}}</h3>
            <img src="{{asset('images/custom/passport-1.png')}}" class="img-fluid"
                 alt="{{__('Turkish Citizenship"')}}">
            <button class="btn btn-main-color w-100 d-block">
                {{__('View More')}}
            </button>
        </a>

    </div>
</div>
