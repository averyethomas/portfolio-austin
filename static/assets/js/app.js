var app = angular.module('angularApp', []);

app.controller('mainCtrl', ['$scope', '$interval', function ($scope, $interval) {

}]);

app.controller('carouselCtrl', ['$scope', '$interval', function ($scope, $interval) {
    var slideIndex = 1;
    activeSlide(slideIndex);

    $scope.changeSlide = function(n){
        activeSlide(slideIndex += n);
    };

    function activeSlide(n){
        var i;
        $scope.slides = document.getElementsByClassName('carouselItem');
        $scope.selected = slideIndex - 1;

        for(i = 0; i < $scope.slides.length; i++){
            $scope.slides[i].classList.remove("active");
        }
        $scope.slides[slideIndex - 1].className += " active";
        
        if (slideIndex == $scope.slides.length) {
            slideIndex == 1;
        }
    }
    
    $scope.startInterval = function(){
            $scope.carouselInterval = $interval($scope.changeSlide(n++), 5000)
    };
        
    $scope.startInterval();

    
}]);
