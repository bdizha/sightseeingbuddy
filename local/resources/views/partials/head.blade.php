<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="http://www.jobeet.co.za">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="Jobeet | Find your job">
    <meta property="og:image" content="/images/icon.png">
    <meta property="og:description" content="">
    <link rel="shortcut icon" href="/images/icon.png" />
    <title>Jobeet | Exciting jobs for bright candidates in South Africa.</title>
    @if(!empty($meta))
    <meta name="description" content="{{ $meta['description'] }} ">
    <meta name="keywords" content="{{ $meta['keywords'] }} ">
    @else
    <meta name="description" content="Find your job. Make your next career move with Jobeet. Find the recruiters, opportunities and companies that will match your job search and enhance your career.">
    <meta name="keywords" content="Jobeet, Cape Town Jobs, Careers South Africa, Better Jobs, New Jobs, Gauteng Jobs, job search, find jobs, careers, recruiter">    
    @endif
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="stylesheet" href="/css/fonts.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/summernote/summernote.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css">
    @if(!empty($isAdmin))
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
    @endif

    <script src="/js/react-with-addons.min.js"></script>
    <script src="/js/cookie.js"></script>
    <script src="/js/highlight.min.js"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/main.js" type="text/javascript"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/summernote/summernote.min.js"></script>
</head>