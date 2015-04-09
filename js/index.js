/**
 * Created by Gert on 02.04.15.
 */
angular.module('ui.bootstrap.demo', ['ui.bootstrap']);

angular.module('ui.bootstrap.demo').controller("TabsController", function () {
    this.tab = 1;
    this.setTab = function (num) {
        this.tab = num;
    };
    this.isSet = function (num) {
        return this.tab === num;
    };
});

angular.module('ui.bootstrap.demo').controller('myCtrl', function ($scope) {
    $scope.heading = "";
    $scope.description = "";
    $scope.giftlist = "";
    $scope.eventdate = "";


});
angular.module('ui.bootstrap.demo').controller('ModalDemoCtrl', function ($scope, $modal, $log) {

    $scope.items = ['item1', 'item2', 'item3'];

    $scope.open = function (size) {

        var modalInstance = $modal.open({
            templateUrl: 'myModalContent.html',
            controller: 'ModalInstanceCtrl',
            size: size,
            resolve: {
                items: function () {
                    return $scope.items;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
});

//comment pop-up
angular.module('ui.bootstrap.demo').controller('ModalCommentCtrl', function ($scope, $modal, $log) {

    $scope.items = ['item1', 'item2', 'item3'];

    $scope.open = function (size) {

        var modalInstance = $modal.open({
            templateUrl: 'comments.html',
            controller: 'ModalInstanceCtrl',
            size: size,
            resolve: {
                items: function () {
                    return $scope.items;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
});


angular.module('ui.bootstrap.demo').controller('ModalInstanceCtrl', function ($scope, $modalInstance, items) {

    $scope.items = items;
    $scope.selected = {
        item: $scope.items[0]
    };

    $scope.ok = function () {
        $modalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});

// Datepicker

angular.module('ui.bootstrap.demo').controller('DatepickerDemoCtrl', function ($scope) {
    $scope.today = function () {
        $scope.dt = new Date();
    };
    $scope.today();

    $scope.open = function ($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };


});

// Timepicker

angular.module('ui.bootstrap.demo').controller('TimepickerDemoCtrl', function ($scope, $log) {
    $scope.mytime = new Date();

    $scope.hstep = 1;
    $scope.mstep = 5;

    $scope.ismeridian = false;

});

// Collapse menu

angular.module('ui.bootstrap.demo').controller('CollapseDemoCtrl', function ($scope) {
    $scope.isCollapsed = true;
});

// Tabcontroller

angular.module('ui.bootstrap.demo').controller('TabsDemoCtrl', function ($scope, $window) {
    $scope.tabs = [
        {
            title: 'Dynamic Title 1',
            content: 'Dynamic content 1'
        },
        {
            title: 'Dynamic Title 2',
            content: 'Dynamic content 2',
            disabled: true
        }
    ];

    $scope.alertMe = function () {
        setTimeout(function () {
            $window.alert('You\'ve selected the alert tab!');
        });
    };
});


// Comment & Attend section code

function FrmController($scope) {
    $scope.comment = [];
    $scope.btn_add = function () {
        if ($scope.txtcomment != '') {
            $scope.comment.push($scope.txtcomment);
            $scope.txtcomment = "";
        }
    }

    $scope.remItem = function ($index) {
        $scope.comment.splice($index, 1);
    }
}

function GiftsController($scope) {
    $scope.gifts = [{'name': 'Väike kassipoeg', 'description': 'Armas väike kiisu', 'price': '30'}];
    $scope.btn_add = function () {
        if ($scope.gifts.name != '' && $scope.gifts.description != '' && $scope.gifts.price != '') {
            $scope.gifts.push({'name': $scope.name, 'description': $scope.description, 'price': $scope.price});
            $scope.name = "";
            $scope.description = "";
            $scope.price = "";
        }
    }
    $scope.remItem = function ($index) {
        $scope.gifts.splice($index, 1);
    }

    $scope.comment = [];
    $scope.comment_add = function () {
        if ($scope.txtcomment != '') {
            $scope.comment.push($scope.txtcomment);
            $scope.txtcomment = "";
        }
    }
}

/*
 // Accordion menu from first TAB

 angular.module('ui.bootstrap.demo').controller('AccordionDemoCtrl', function ($scope) {
 $scope.oneAtATime = true;

 $scope.groups = [
 {
 title: 'Korraldaja',
 content: 'Mihkel Must'
 },
 {
 title: 'Raha',
 content: 'EE928481092845823390'
 }
 ];

 $scope.items = [{'name': 'Mahlapress', 'price': '40'},
 {'name': 'Jalgratas', 'price': '60'}


 ];

 $scope.addItem = function () {
 var newItemNo = $scope.items.length + 1;
 $scope.items.push({'name': 'Kingitus', 'price': '0'});
 };

 $scope.status = {
 isFirstOpen: true,
 isFirstDisabled: false
 };
 });*/