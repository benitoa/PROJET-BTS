$(document).ready(function() {
	$('#search').keyup(function() {
		var search = $(this).val();
		search = $.trim(search);
		if (search !== "") {
			$('#load').show();
			$.post('postSuppr.php', {
				search : search
			}, function(data) {
				$('#resultat ul').html(data).show();
				$('#load').hide();

				// clique
				$('a').click(function() {
					var lien = $(this).text();
					$('#load').show();
					$('#search').attr('value', lien);
					$.post('showSuppr.php', {
						lien : lien
					}, function(data) {
						$('#feedback').html(data);
						$('#load').hide();
						$('#resultat ul').hide();
					});
				});
			});
		}
	});
});