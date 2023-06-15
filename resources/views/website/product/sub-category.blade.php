  <div class="col-lg-6">
      <div class="form-group">

          <select class="form-control category sub-category" name="sub_category">
              <option value="">Sub Category</option>
              @if ($categories)
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">
                      {{ ucwords($category->category_name) }}</option>
              @endforeach
          @endif
          </select>
      </div>
  </div>
