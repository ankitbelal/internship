@extends('layouts.app')
@section('title','Home Child')
@section('content')


    <h1>Home Child</h1>
    <p>This is the home child page</p>
    <div>
        iam here learning about the layout page and how to inject content from the child page to master page
    </div>
@endsection
@push('css')
    <style>
        nav {
            background-color: darkslategray;
            justify-content: center;
            padding: 10px;
            display: flex;
            text-align: center;
             margin-bottom: 20px;
             
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }
        nav ul{
            list-style-type: none;
            display: flex;
            justify-content: center;
        }
        body{
            background-color: antiquewhite;
         
            align-items: center;
        }

        p{
            margin-top: 10px;
            margin: 0 auto;
            width: 10%;
            background-color: lightgreen;
            text-align: center;
        
        }
        h1{
            margin-top: 10px;
            margin: 0 auto;
           background-color: aqua;
           text-align: center;
           width: 20%;
           margin-bottom: 10px;
        }

        div{
            margin: 0 auto;
            margin-top: 10px;
            background-color: lightskyblue;
            text-align: center;
            width: 50%;
            height: 10%;
        }
        .btn-danger {
            display: block;
         
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
           
            cursor: pointer;
            border-radius: 4px;
            margin-left: 47%;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background-color: darkred;
        }
    </style>
    