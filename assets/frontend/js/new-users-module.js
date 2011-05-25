$(function(){
    $('body').DOPImageLoader({'Container':'#search-members',
                    'LoaderURL': BASE_URL+'assets/frontend/gui/images/loaders/small-loader1.gif',
                    'NoImageURL': BASE_URL+'assets/frontend/gui/images/no-images/no-profile-image-48.jpg',
                    'LoadingInOrder': false,
                    'ImageDelay': 200});
});