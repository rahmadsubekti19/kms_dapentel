$(document).ready(function(){
	/**
	 * submit komentar
	 */
	$(document).keypress(function(e) { //for give enter respond
		if(e.which == 13) {
			var form_komentar_sop = $("#js-form-komentar-sop");
			// console.log(form_komentar.serialize());
			var input = JSON.stringify(form_komentar_sop.serialize() );

			$.ajax({
				type : 'post',
				url: "http://localhost:8000/komentarSop", 
				dataType: 'json',
				data: input,
				beforeSend: function(xhr){
					xhr.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
				},
				success: function(result){
					console.log(input.id_sop);

					render_komentar(result.dataKomentarSop);

					$("#js-input-deskripsi").val("");

				//ditambah .html atau .val('')
				
				// $("#div1").html(result);
			}});

			e.preventDefault();
			return false;
		}
	});


	/**
	*load detail sop
	*/
	$(".js-sop-item").click(function(){
		$("#sop-all").remove();
		var sop_id = $(this).data("id");
		$("#panel-detail-sop").show();

		var pengajuan_revisi = $("#js-pengajuan-revisi");
		var sop_detail_id = $("#js-sop-id");
		var sop_judul = $("#js-sop-judul");
		var sop_deskripsi = $("#js-sop-deskripsi");
		var sop_file = $("#js-sop-file");
		var sop_versi = $("#js-sop-versi");
		var sop_created_at = $("#js-sop-created_at");
		var komentar_sop_id_sop = $("#js-komentar-sop-id_sop");

		$.ajax({
			url: "http://localhost:8000/get-sop-json/"+sop_id, 
			success: function(result){
				sop_detail_id.html(result.dataSop.id);
				sop_judul.html(result.dataSop.judul);
				sop_deskripsi.html(result.dataSop.deskripsi);
				sop_file.html(result.dataSop.file);
				sop_file.attr("href", "http://localhost:8000/uploads/"+result.dataSop.file);
				sop_versi.html(result.dataSop.versi);
				sop_created_at.html(result.dataSop.tgl_dibuat);
				komentar_sop_id_sop.val(result.dataSop.id);
				pengajuan_revisi.attr('data-sop-id', result.dataSop.id);
				$('#js-jadikan-acuan').attr('data-id', result.dataSop.id);

				handlekomentarsop(result);
			}
		});
	});


	$("#js-jadikan-acuan").click(function(){
		$.ajax({
			type : 'post',
			url: "http://localhost:8000/post-acuan-json", 
			dataType: 'json',
			data: {counter:1, id_sop: $(this).data('id')},
			beforeSend: function(xhr){
				xhr.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
			},
			success: function(result){
				console.log(result);

					// render_komentar(result.dataKomentarSop);

					$("#js-jumlah-acuan").html(result.dataAcuan.jumlah_acuan+" Telah Dijadikan Acuan");

				//ditambah .html atau .val('')
				
				// $("#div1").html(result);
			}});
	});

	 /**
	 * render array komentar
	 */

	 function handlekomentarsop(result){
	 	var box_comments = $(".box-comments").html("");

	 	if (result.komentar_sop != null) {
			//komentar
			var komentar_sop = result.komentar_sop;
			console.log(komentar_sop);
            	// box_comments.append(item_komentar.show());
            	// var container = $('<div />');
            	for(var i = 0; i < komentar_sop.length ; i++) {

            		var komentar_sop_comment = komentar_sop[i];

            		render_komentar(komentar_sop_comment);
            	}
            }

            	// box_comments.html(container);
            }

            /**
	 * render item komentar
	 */

	 function render_komentar(komentar_sop_comment){
            	// var box_comments = ;

            	var template_komentar = $("#template-komentar-sop").clone().removeAttr("id").show();

            	console.log(komentar_sop_comment);
            	console.log(template_komentar);

            	template_komentar.children(".js-komentar-sop-comment").append(komentar_sop_comment.deskripsi);
            	template_komentar.find(".js-komentar-sop-created").html(komentar_sop_comment.created_at); 
            	template_komentar.find(".js-komentar-sop-user").append(komentar_sop_comment.user.nama); 

            	$(".box-comments").append(template_komentar);
     }

     $('.btn-tambah-pokok-bahasan').click(function() {
     	$('.pokok-bahasan').first().clone().appendTo('.pokok-bahasan-wrap');
     	// Update title
     	$('.pokok-bahasan-wrap').find('.pokok-bahasan:last').find('.judul-pokok-bahasan').text('Pokok Bahasan ' + $('.pokok-bahasan').size());
     	$('.pokok-bahasan-wrap').find('.pokok-bahasan:last').find('textarea').val("");

     });
});

//get id_sop from button

$('#revisiSop').on('show.bs.modal', function (e) {
	var sop_id = $('#js-pengajuan-revisi').data("sop-id");
	console.log(sop_id);
	$("#js-id-sop").val(sop_id);
})

/**
*change status knowledge on table
*/

$(".js-status-knowledge").click(function(){
	var status_knowledge = $(this).data("value");
	console.log(status_knowledge);

	var item_knowledge_id = $(this).data("id");
	console.log(item_knowledge_id);

	$.ajax({
		type : 'post',
		url: "http://localhost:8000/knowledge/update_status", 
		dataType: 'json',
		data: { status_knowledge: status_knowledge, item_knowledge_id: item_knowledge_id},
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
		},
		success: function(result){
					// console.log(input.id_sop);
					console.log(status_knowledge);
					$(".js-status-kn").html(status_knowledge);
					$(".js-status-kn").css("text-transform","capitalize");
					location.reload();
				}});
});


