@extends('layout.master')
@section('title')
Bill Of Material&nbsp;&nbsp;
@stop
@section('page-style')

	<style>
		.column {
		  float: left;
		  width: 50%;
		}
		/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		.content-loader tr td {
		    white-space: nowrap;
		}
	</style>
	<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}"/>
@stop
@section('content')
<!-- Input -->
	<form enctype="multipart/form-data"  id="bom_form" name="bom_form" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-body card-outline card-olive">
						<div class="body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row clearfix">
								<div class="col-md-4">
									<div class="form-group">
									<span class="has-float-label">
										<select class="customerName form-control" name="customer_name" id="customer_name"></select>
										<label for="customer">Customer Name</label>
									</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span class="has-float-label">
											<input type="text" class="form-control"  name="bom_project" id="bom_project" placeholder="Project Name" />
											<label for="project">Project Name</label>
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span class="has-float-label">
											<input type="text" class="form-control"  name="bom_partno" id="bom_partno" placeholder="Part Number" />
											<label for="project">Part No</label>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body card-outline card-secondary">
						<div class="body">
							<div class="row clearfix">
								<div class="col-md-12">
									<label><h4>Bill Of Material: </h4></label>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-success mb-2 mr-1" data-toggle="modal" data-target="#largeModal"><i class="fa fa-plus"></i></a>
								</div>
								<table id="mainTable" class="table table-striped c_table">
									<thead>
										<tr>
											<th>SI.No</th>
											<th>Part Number</th>
											<th>Part Name</th>
											<th>Size</th>
											<th>Material</th>
											<th>Grade</th>
											<th>UOM</th>
											<th>Qty</th>
											<th>Finish</th>
											<th>Weight</th>
											<th>Local / Imported</th>
											<th>Remarks</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<center><button type="Submit" class="btn btn-raised btn-success waves-effect" value="" name="bom_submit" id="bom_submit">Submit</button></center>
	</form>	
@stop
@section('modal')
<form id="add_bom_material" name="add_bom_material">
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="myModal">
				<div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Bill Of Material</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
      	<div class="modal-body">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
      		<input type="hidden" name="flag" id="flag" value="" />
      		<div class="row clearfix">
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="part_number" id="part_number" placeholder="Enter Part Number">
      						<label for="formGroupExampleInput">Part Number</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="part_name" id="part_name" placeholder="Enter Part Name">
      						<label for="formGroupExampleInput">Part Name</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="size" id="size" placeholder="Enter Size">
      						<label for="formGroupExampleInput">Size</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="material" id="material" placeholder="Enter Material">
      						<label for="formGroupExampleInput">Material</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="grade" id="grade" placeholder="Enter Grade">
      						<label for="formGroupExampleInput">Grade</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="uom" id="uom" placeholder="Enter UOM">
      						<label for="formGroupExampleInput">UOM</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="qty" id="qty" placeholder="Enter Qty">
      						<label for="formGroupExampleInput">Qty</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="finish" id="finish" placeholder="Enter Finish">
      						<label for="formGroupExampleInput">Finish</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight">
      						<label for="formGroupExampleInput">Weight</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="form-group">
      					<span class="has-float-label">
      						<input type="text" class="form-control" name="local_import" id="local_import" placeholder="Enter Local / Imported">
      						<label for="formGroupExampleInput">Local / Imported</label>
      					</span>
      				</div>
      			</div>
      			<div class="col-md-12">
      				<div class="form-group">
      					<span class="has-float-label">
      						<textarea class="form-control" name="remarks" rows="2" cols="20" id="remarks" style="height:140px;width:80%"></textarea>
      						<label for="formGroupExampleInput">Remarks</label>
      					</span>
      				</div>
      			</div>
      		</div>
      		<center>
	      		<button type="button" class="btn btn-raised btn-primary waves-effect bom_save" id="bom_save" name="bom_save">SAVE</button>
						<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
					</center>
				</div>	
			</div>
		</div>
	</div>
</form>		
@stop
@section('page-script')
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script>
$(document).ready(function ()
{ 
	$('.customerName').select2({
	  placeholder: 'Select Customer',
	  ajax: {
		url: "{{url('eapd/auto_customername')}}",
		dataType: 'json',
		delay: 250,
		processResults: function (data) {
			//console.log(data);
		  return {
			results:  $.map(data, function (item) {
              return {
                  text: item.text,
                  id: item.id
              }
          })
		  };
		 // rfqNumber();
		},
		cache: true
	  }
	});
	var row=1;
  $('#myModal').on('click', ".bom_save", function () {
	var part_number = $('#part_number').val();
	var part_name = $('#part_name').val();
	var size = $('#size').val();
	var material = $('#material').val();
	var grade = $('#grade').val();
	var qty = $('#qty').val();
	var finish = $('#finish').val();
	var uom = $('#uom').val();
	var weight = $('#weight').val();
	var local_import = $('#local_import').val();
	var remarks = $('#remarks').val();
	var row= $('#mainTable tbody tr').length +1;
	
    var new_row = '<tr id="row' + row + '"><td>'+row+'</td><td><input name="part_number[]" id="part_number[]" value="' + part_number+ '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="part_name[]" id="part_name[]" value="' + part_name+ '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="size[]" id="size[]" type="text" value="' + size + '" class="form-control" readonly/></td>'
					  +'<td><input name="material[]" id="material[]" value="' + material + '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="grade[]" id="grade[]" value="' + grade + '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="uom[]" id="uom[]" value="' + uom + '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="qty[]" id="qty[]" value="' + qty + '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="finish[]" id="finish[]" value="' + finish + '" type="text" class="form-control" readonly/></td>'					  
					  +'<td><input name="weight[]" id="weight[]" value="' + weight + '" type="text" class="form-control" readonly/></td>'
					  +'<td><input name="local_import[]" id="local_import[]" value="' + local_import + '" type="text" class="form-control" readonly/></td>'
					  +'<td><textarea class="form-control rounded-0" name="remarks[]" id="remarks[]" rows="2" cols="8" readonly>' + remarks + '</textarea></td>'
					  +'<td><i class="zmdi zmdi-delete delete-row"></i></td></tr>';
    $('#mainTable').append(new_row);
    $('#largeModal').modal('hide');
	$("#add_bom_material").trigger("reset");
  });
    // Remove row
  $(document).on("click", ".delete-row", function () {
	   var id = $(this).closest('tr').attr('id'); 
	   var row = $(document.getElementById(id)); // Or continue to use the invalid ID selector: '#'+id
       var siblings = row.siblings();
	   row.remove();
	   siblings.each(function(index) {
       $(this).children('td').first().text(index + 1);
    });
  return false;
  });
});
</script>
@stop