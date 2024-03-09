@extends('backend.dashboard');
@section('containts')
    <section>
        <div class="container mt-5">
            <div class="row">
                 {{--form--}}

            @if (Route::is('category'))
                  <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                             <h4 class="text-light">Add Category</h4>
                        </div>

                         <div class="card-body">
                                 <form action="{{route('category.insert')}}" method="POST">
                                    @csrf

                                     <label for="category">category</label>
                                     <input name="category" placeholder="category" id="category" type="text" class="form-control">
                                     <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                                 </form>
                         </div>
                    </div>
               </div>
                  @else
                  <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                             <h4 class="text-light">edit Category</h4>
                        </div>

                         <div class="card-body">
                                 <form action="{{route('category.update',$findCategory->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                     <label for="category">category</label>
                                     <input value="{{ $findCategory->category }}" name="category" placeholder="category" id="category" type="text" class="form-control">
                                     <button type="update" class="btn btn-primary w-100 mt-3">update</button>
                                 </form>
                         </div>
                    </div>
                 </div>

                  @endif

                   {{--table--}}
                   <div class="col-lg-8 ">
                        <table class="table table-striped shadow">
                           <tr>
                               <td align="center">Sn</td>
                               <td>Category</td>
                             <td>Category-slug</td>
                               <td>Action</td>
                           </tr>

                          @forelse ($categorys as $key=>$category)
                               <tr>
                                    <td align="center">{{ $categorys->firstItem() +$key }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td>
                                       <div class="btn-group">
                                          <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm">edit</a>
                                          <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger btn-sm">delete</a>
                                       </div>
                                    </td>
                               </tr>
                          @empty

                            <tr>
                              <td>no data Found</td>
                            </tr>

                          @endforelse
                        </table>
                        {{ $categorys->links() }}
                   </div>
            </div>
        </div>
    </section>
@endsection

