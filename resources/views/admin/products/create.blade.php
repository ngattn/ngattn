@extends('admin.layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('css')


@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm mới sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@stop

@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="row container-fluid">
                <div style="width: 50%;font-size: 20px">Thêm mới sản phẩm</div>
                <div style="width: 50%; float: right">
                    <a href="{{ route('products.index') }}" style="float: right">Quay lại danh sách</a>
                </div>
                <hr>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">


                            {{--                    Name--}}
                            <div class="form-group">
                                <label>Tên sản phẩm:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="title" name="txtName" value="{{ old('txtName') }}">
                                    <div class="error" id="txtNameErr"></div>
                                </div>
                                <!-- /.input group -->
                            </div>

                            {{--                    Keyword--}}
                            <div class="form-group" hidden>
                                <label>Từ khóa:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="txtKeyword" name="txtKeyword" value="{{ old('txtKeyword') }}">
                                </div>
                            </div>

                            {{--                    Description--}}
                            <div class="form-group">
                                <label>Mô tả:</label>

                                <div class="input-group">
                                    <div class="card-body pad">
                                        <div class="" >
                                            <textarea name="txtDescription" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('txtDescription') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                    Content--}}
                            <div class="form-group">
                                <label>Nội dung:</label>

                                <div class="input-group">
                                    {{--                                <section class="content">--}}
                                    <div class="card-body pad">
                                        <div class="" >
                                            <textarea name="txtContent" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('txtContent') }}</textarea>
                                        </div>
                                    </div>
                                    {{--                                </section>--}}

                                </div>
                            </div>

                            {{--                    SKU ma hang--}}
                            <div class="form-group" hidden>
                                <label>Mã sản phẩm:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="txtSKU" name="txtSKU">
                                    <div class="error" id="txtSKUErr" value="{{ old('txtSKUErr') }}"></div>
                                </div>
                            </div>

                            {{--                    Price cost--}}
                            <div class="form-group">
                                <label>Giá khuyến mãi:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                          </span>
                                    </div>
                                    <input type="number" class="form-control float-right" id="txtPriceCost" name="txtPriceCost" value="{{ old('txtPriceCost') }}">
                                </div>
                            </div>

                            {{--                    Price--}}
                            <div class="form-group">
                                <label>Giá gốc:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control float-right" id="txtPrice" name="txtPrice" value="{{ old('txtPrice') }}">
                                </div>
                            </div>

                            {{--                    Stock--}}
                            <div class="form-group">
                                <label>Số lượng:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control float-right" id="txtStock" name="txtStock" value="{{ old('txtStock') }}">
                                </div>
                            </div>

                            {{--                    Slug--}}
                            <div hidden class="form-group">
                                <label>Slug:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="slug" name="txtSlug" value="{{ old('txtSlug') }}">
                                </div>
                                <!-- /.input group -->
                            </div>

                            {{--                    Display website--}}
                            <div class="form-group">
                                <label>Hiển thị trên web:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                    </div>
                                    <select class="form-control" id="exampleFormControlSelect" name="txtDisplay">
                                        <option value="0">Không hiển thị</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>

                        </div>
                        <div class="col-md-4">
                            {{--                    Category product--}}
                            <div class="form-group">
                                <label>Thế loại sản phẩm:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" id="txtcategory" name="txtcategory">
                                        <option value="">--Chọn thể loại sản phẩm--</option>
                                        @foreach($categoryProducts as $categoryProduct)
                                            <option value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>

                            {{--                    Type product--}}
                            <div class="form-group">
                                <label>Loại sản phẩm:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-pen"></i>
                          </span>
                                    </div>
                                    <select class="form-control" id="txtTypeProduct" name="txtTypeProduct">
                                        <option value="">--Chọn loại sản phẩm--</option>
                                        @foreach($typeProducts as $typeProduct)
                                            <option value="{{ $typeProduct->id }}">{{ $typeProduct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>

                            {{--                    Image--}}
                            <div class="form-group">
                                <label>Ảnh:</label>

                                <div class="input-group">
                                    <input type="file" name="txtImage">
                                </div>
                            </div>
                            <div class="col-md-4">
                                @for($i = 1; $i < 8; $i++)
                                    <div class="form-group">
                                        <label>Ảnh liên quan {{ $i }}</label>
                                        <input type="file" name="fProductDetail[]"/>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('customer/js/product.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#title").change(function () {
                var title = $(this).val();
                // alert(title);
                //Đổi chữ hoa thành chữ thường
                slug = title.toLowerCase();

                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('slug').value = slug;
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#txtcategory').change(function () {
               var idCateqory = $('#txtcategory').val();
                // alert(idCateqory);
               $.get("{{ url('') }}/products/ajax/idCategory/"+idCateqory,function(data){
                   // alert(data);
                   $("#txtTypeProduct").html(data);
               });
            });
        });
    </script>

    <script>
        function makeid(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
        console.log(makeid(10))
    </script>
@stop


