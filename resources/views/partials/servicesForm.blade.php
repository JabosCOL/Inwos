@csrf
<div class="card text-center">
  <div class="card-header">
    <h4>{{ $Text }}</h4>
  </div>
  <div class="card-body row g-3">
    <div class="form-group">
      @if ($user_id)
      <input id="user_id" class="form-control" type="number" name="user_id" hidden value="{{$user_id}}">
      @endif
    </div>
    @if ($service->image)
    <div class="mb-2 col-md-3">
      <img class="card-img-top" style="background-size: cover; width: 200px;" src="/storage/{{ $service->image }}" alt="{{ $service->name }}">
    </div>
    @endif
    <div class="{{request()->routeIs( $route ) ? 'mb-3 col-md-8 pt-5' : 'mb-3 col-md-12'}}">
      <label for=" image" class="form-label">Choose the image for your service</label>
      <input class="{{request()->routeIs( $route ) ? 'form-control border-2 ml-5' : 'form-control border-2'}}" name="image" type="file" id="image">
      {{ $errors->first('image') }}
    </div>
    <div class=" col-md-6">
      <label for="name" class="form-label">{{__('Tittle')}}</label>
      <input type="text" name="name" class="form-control border-2" id="name" placeholder="{{ __('Insert the service tittle') }}" value="{{ old('name', $service->name) }}">
      {{ $errors->first('name') }}
    </div>
    <div class="col-md-6">
      <label for="address" class="form-label">{{__('Address')}}</label>
      <input type="text" name="address" class="form-control border-2" id="address" placeholder="{{ __('Insert the service address') }}" value="{{ old('address', $service->address) }}">
      {{ $errors->first('address') }}
    </div>
    <div class="col-md-12">
      <label for="description" class="form-label">{{__('Description')}}</label>
      <textarea rows="5" name="description" type="text" class="form-control border-2" id="description" placeholder="{{ __('Insert a description') }}">{{ old('description', $service->description) }}</textarea>
      {{ $errors->first('description') }}
    </div>
    <div class="col-md-4">
      <label for="city_id" class="form-label">{{__('City')}}</label>
      <select class="form-select border-2" id="city_id" name="city_id">
        <option value="">{{ __('Choose the city') }}</option>
        @foreach ($cities as $id =>$name)
        <option value="{{ $id }}" {{ $id == old('city_id', $service->city_id) ? "selected" : '' }}>{{ $name }}</option>
        @endforeach
      </select>
      {{ $errors->first('city_id') }}
    </div>
    <div class="col-md-4">
      <label for="category_id" class="form-label">{{__('Category')}}</label>
      <select name="category_id" class="form-select border-2" id="category_id">
        <option value="">{{ __('Choose the category') }}</option>
        @foreach ($categories as $id => $name)
        <option value="{{ $id }}" {{ $id == old('category_id', $service->category_id) ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
      </select>
      {{ $errors->first('category_id') }}
    </div>
    <div class="col-md-4">
      <label for="validationPrice" class="form-label">{{__('Price')}}</label>
      <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="number" name="price" class="form-control border-2" id="validationPrice" placeholder="{{ __('Insert the price') }}" value="{{ old('price', $service->price) }}">
        {{ $errors->first('price') }}
      </div>
    </div>

  </div>
  <div class="card-footer text-muted pb-3 pt-3">

    <button class="btn btn-primary col-8" type="submit">{{ $btnText }}</button>

  </div>
</div>