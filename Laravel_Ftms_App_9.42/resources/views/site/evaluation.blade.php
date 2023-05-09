@extends('site.master')

@section('title', 'Book Time - ' . env('APP_NAME'))

@section('content')

    <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-white">Evaluation ({{ $evaluation->name }})</h1>
        </div>
    </section>
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10 py-5">
                    <form action="{{ route('ftms.evaluation_applied', $evaluation->id) }}" method="POST">
                        @csrf
                        <table class="table">
                            <tr>
                                <th style="width: 40%">Question</th>
                                <th colspan="5">Answers</th>
                            </tr>
                            @foreach ($evaluation->questions as $q)
                                <tr>
                                    <th>{{ $q->question }}</th>
                                    <td>
                                        <label><input type="radio" name="answer[{{ $q->id }}]" value="Bad" required> Bad</label>
                                    </td>
                                    <td>
                                        <label><input type="radio" name="answer[{{ $q->id }}]" value="Accepted" required> Accepted</label>
                                    </td>
                                    <td>
                                        <label><input type="radio" name="answer[{{ $q->id }}]" value="Good" required> Good</label>
                                    </td>
                                    <td>
                                        <label><input type="radio" name="answer[{{ $q->id }}]" value="Very Good" required> Very Good</label>
                                    </td>
                                    <td>
                                        <label><input type="radio" name="answer[{{ $q->id }}]" value="Excellent" required> Excellent</label>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <button class="btn btn-success">Sumbit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
