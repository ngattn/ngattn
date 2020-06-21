@extends('admin.layouts.app')

@section('title', 'Add new type product')

@section('css')


@endsection

@section('content_header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa sản phẩm </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                <div style="width: 50%;font-size: 20px">Sửa sản phẩm</div>
                <div style="width: 50%; float: right">
                    <a href="{{ route('products.index') }}" style="float: right">Danh sách</a>
                </div>
                <hr>
            </div>
            <hr>
            <form method="POST" action="" enctype="multipart/form-data" name="frmEditProduct">
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
                                    <input type="text" class="form-control float-right" id="title" name="txtName" value="{{ $products->name }}">
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
                                    <input type="text" class="form-control float-right" id="txtKeyword" name="txtKeyword" value="{{ $products->keyword }}">
                                </div>
                            </div>

                            {{--                    Description--}}
                            <div class="form-group">
                                <label>Mô tả:</label>

                                <div class="input-group">
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text">--}}
{{--                                            <i class="fas fa-pen"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <input type="text" class="form-control float-right" id="txtDescription" name="txtDescription" value="{{ $products->description }}">--}}

                                    <div class="card-body pad">
                                        <div class="">
                                            <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txtDescription">{{ $products->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                    Content--}}
                            <div class="form-group">
                                <label>Nội dung:</label>

                                <div class="input-group">
                                    <div class="card-body pad">
                                        <div class="">
                                            <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txtContent">{{ $products->content }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{--                    SKU ma hang--}}
                            <div class="form-group">
                                <label>Mã sản phẩm:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="txtSKU" name="txtSKU" value="{{ $products->sku }}">
                                </div>
                            </div>

                            {{--                    Price cost--}}
                            <div class="form-group">
                                <label>Giá khuyến mại:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="txtPriceCost" name="txtPriceCost" value="{{ $products->price_cost }}">
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
                                    <input type="text" class="form-control float-right" id="txtPrice" name="txtPrice" value="{{ $products->price }}">
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
                                    <input type="text" class="form-control float-right" id="txtStock" name="txtStock" value="{{ $products->stock }}">
                                </div>
                            </div>

                            {{--                    Slug--}}
                            <div hidden class="form-group">
                                <label>Slug:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="slug" name="txtSlug">
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
                                        <option {{ $products->status == 0 ? 'selected' :'' }} value="0">Không hiển thị</option>
                                        <option {{ $products->status == 1 ? 'selected' :'' }} value="1">Hiển thị</option>
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
                                        @foreach($categoryProducts as $categoryProduct)
                                            <option @if($products->type_product_id == $categoryProduct->id)
                                                {{ 'selected' }}
                                                @endif
                                                value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}</option>
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
                                        @foreach($typeProducts as $typeProduct)
                                            <option @if($products->type_product_id == $typeProduct->id)
                                                    {{ 'selected' }}
                                                @endif
                                                value="{{ $typeProduct->id }}">{{ $typeProduct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                            {{--   Image Current--}}
                            <div class="form-group">
                                <label for="Product Name">Ảnh cũ</label>
                                <img src="{!! asset('uploads/products/'.$products->image) !!}" class="imageCurrent" style="width: 100px; height: 100px">
                                <input type="hidden" name="img_current" value="{!! $products->image !!}">
                            </div>

                            {{--                    Image--}}
                            <div class="form-group">
                                <label>Ảnh:</label>

                                <div class="input-group">
                                    <input type="file" name="fimage">
                                </div>
                            </div>

                            <div class="col-md-4">
                                @foreach($products_image as $key => $item)
                                    <div class="form-group" id="{!! $key !!}">
                                        <img src="{!! asset('uploads/products/image_product/'.$item->image) !!}" class="img_detail" idHinh="{!! $item->id !!}" id="{!! $key !!}" style="width: 100px;height: 100px">
                                        <a href="javascript:void(0)" type="button" id="del_img_demo" class="del_img_demo btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                                    </div>
                                @endforeach
                                <button type="button" class="btn btn-primary btn-sm" id="addImages">Thêm ảnh liên quan</button>
                                <div id="insert"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
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

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
//        alert(111);
            $("#addImages").click(function () {
//            alert(111);
                $("#insert").append('<div class="form-group"><input type="file" name="fProductDetail[]"></div>');
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $(".del_img_demo").on('click', function () {
                var url = "http://kltn.test/products/delImg/";
                var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
                var idHinh = $(this).parent().find("img").attr("idHinh");
                var img = $(this).parent().find("img").attr("src");
                var rid = $(this).parent().find("img").attr("id");
                $.ajax({
                    url: url + idHinh,
                    type: 'GET',
                    cache: false,
                    data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
                    success: function(data){
                        if(data == "Oke"){
                            $("#"+rid).remove();
                        }else {
                            alert("Error ! Please Contaat admin");
                        }
                    }
                });
            })
        })
    </script>
@stop


