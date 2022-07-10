@extends('layouts.main')
@extends('layouts.navbar')
@extends('layouts.sidebar')

@section('content')
<style>
    .image-cropper {
  width: 100px;
  height: 100px;
  position: relative;
  overflow: hidden;
  border-radius: 50%;
}

img {
  display: inline;
  margin: 0 auto;
  height: 100%;
  width: auto;
}
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <canvas id="c" style="border:1px solid black" width="400" height="500"></canvas>
                        </div>
                        <div class="col-md-4">
                            <div class="image-cropper">
                                <img id="rectangle" src="https://i.pinimg.com/originals/4e/cb/32/4ecb32278c0957cadb90e9769b836087.png" width="20px"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">X</div>
                        <div class="col-md-8">
                            <input type="text" id="x" />
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">Y</div>
                        <div class="col-md-8">
                            <input type="text" id="y" />
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">Width</div>
                        <div class="col-md-8">
                            <input type="text" id="width" />
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">Height</div>
                        <div class="col-md-8">
                            <input type="text" id="height" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/fabric.min.js')}}"></script>
<script src="{{asset('assets/fabric.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var canvas = new fabric.Canvas('c');
        
        $(document).on('click', '#rectangle', function() {
            rectangle = new fabric.Rect({
                left: 20,
                top: 80,
                width: 300,
                height: 100,
                originX: 'left',
                originY: 'top',
                fill: '',
                stroke: 'black',
                strokeWidth: 2,
            });

            function objectAddedListener(ev) {
                let target = ev.target;
                console.log('left', target.left, 'top', target.top, 'width', target.width, 'height', target.height);
                document.getElementById('y').value = canvas.item(0).controls.mtr.offsetY;
                document.getElementById('x').value = canvas.item(0).controls.mtr.offsetX;
                document.getElementById('width').value = target.width;
                document.getElementById('height').value = target.height;
            }

            function objectMovedListener(ev) {
                let target = ev.target;
                console.log('left', target.left, 'top', target.top, 'width', target.width, 'height', target.height);
                document.getElementById('y').value = canvas.item(0).controls.mtr.offsetY;
                document.getElementById('x').value = canvas.item(0).controls.mtr.offsetX;
                document.getElementById('width').value = target.width;
                document.getElementById('height').value = target.height;
            }

            canvas.on('object:added', objectAddedListener);
            canvas.on('object:modified', objectMovedListener);
            
            canvas.add(rectangle);
            canvas.setActiveObject(rectangle);

            

            // console.log(canvas.item(0).controls.mtr.width);
            // document.getElementById('y').value = canvas.item(0).controls.mtr.offsetY;
            // document.getElementById('x').value = canvas.item(0).controls.mtr.offsetX;
            // document.getElementById('width').value = canvas.item(0).controls.mtr.width;
            // document.getElementById('height').value = canvas.item(0).controls.mtr.height;

            // document.getElementById('y').onchange = function() {
            //     canvas.item(0).controls.mtr.offsetY = -parseFloat(this.value);
            //     canvas.requestRenderAll();
            // };
        });

    });
</script>
@endsection