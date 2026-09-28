<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Maria Skłodowska-Curie -->
     <h1>Your in Job/Index</h1>
     @foreach ($jobs as $job)
        <div>
            <h2>Job Title: {{$job['title']}}</h2>  
            <p> Salary: {{$job['Salary']}}</p>
        </div>
        @endforeach
</div>
