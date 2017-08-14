$(function() {
        var InitialRating =  Number( $('.js-rating-bar').data('rating') );
        $('.js-rating-bar').barrating('show', {
          theme: 'css-stars',
          initialRating: InitialRating,
          onSelect: function(value, text, event) {
              if (value === 0) return false;
              var $form = $(".js-rating-form");
              
              var data = {
                  "rating": value,
                  "_token": $form.find("input[name=_token]").val(),
                  "school_id": $(".js-school-id").val()
              }
                 $.ajax({
                type: "POST",
                url: $form.data("url"),
                data:data,

                cache: false,
                success: function(data) {
                    $(".rated-text").removeClass("hidden");
                    var data = JSON.parse(data);
                    $(".rating-score-text").html(data.rating);
                },
                error: function(data) {
                    
                }

        });
             
             
             
  }
});
});
