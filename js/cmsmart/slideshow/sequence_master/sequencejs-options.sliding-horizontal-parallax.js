var tpj=jQuery;
	tpj.noConflict();
tpj(document).ready(function(){
    var options = {
        autoPlay: true,
        nextButton: true,
        prevButton: true,
        preloader: true,
        navigationSkip: false
    };
	
    var sequence = tpj("#sequence").sequence(options).data("sequence");

    sequence.afterLoaded = function(){
        tpj(".sequence-prev, .sequence-next").fadeIn(500);
    }
});