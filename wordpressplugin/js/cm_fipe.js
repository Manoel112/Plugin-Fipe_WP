jQuery(document).ready(function($) {
  $('#tipo_veiculo').change(function() {
      var tipoVeiculo = $(this).val();
      $.ajax({
          url: consulta_fipe_data.ajax_url,
          type: 'POST',
          data: {
              action: 'consulta_fipe_get_marcas',
              tipo_veiculo: tipoVeiculo
          },
          success: function(response) {
              $('#marca').html(response);
          }
      });
  });

  $('#marca').change(function() {
      var marca = $(this).val();
      var tipoVeiculo = $('#tipo_veiculo').val();
      $.ajax({
          url: consulta_fipe_data.ajax_url,
          type: 'POST',
          data: {
              action: 'consulta_fipe_get_modelos',
              marca: marca,
              tipo_veiculo: tipoVeiculo
          },
          success: function(response) {
              $('#modelo').html(response);
          }
      });
  });

  $('#modelo').change(function() {
      var modelo = $(this).val();
      var marca = $('#marca').val();
      var tipoVeiculo = $('#tipo_veiculo').val();
      $.ajax({
          url: consulta_fipe_data.ajax_url,
          type: 'POST',
          data: {
              action: 'consulta_fipe_get_anos',
              modelo: modelo,
              marca: marca,
              tipo_veiculo: tipoVeiculo
          },
          success: function(response) {
              $('#ano').html(response);
          }
      });
  });

  $('#ano').change(function() {
      var ano = $(this).val();
      var modelo = $('#modelo').val();
      var marca = $('#marca').val();
      var tipoVeiculo = $('#tipo_veiculo').val();
      $.ajax({
          url: consulta_fipe_data.ajax_url,
          type: 'POST',
          data: {
              action: 'consulta_fipe_get_resultado',
              ano: ano,
              modelo: modelo,
              marca: marca,
              tipo_veiculo: tipoVeiculo
          },
          success: function(response) {
              $('#consulta_fipe_result').html(response);
          }
      });
  });
});
