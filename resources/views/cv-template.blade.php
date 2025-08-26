<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $profile->full_name }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 11pt; color: #333; }
        @page { margin: 40px 50px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 24pt; }
        .header h2 { margin: 5px 0; font-size: 14pt; color: #555; }
        .contact-info { text-align: center; font-size: 10pt; margin-bottom: 25px; }
        .section-title { font-size: 14pt; font-weight: bold; color: #000; border-bottom: 2px solid #333; padding-bottom: 5px; margin-bottom: 15px; }
        .content p { margin-top: 0; }
        .job, .edu { margin-bottom: 15px; }
        .job-title, .degree { font-weight: bold; }
        .company, .institution { font-style: italic; color: #555; }
        .period { float: right; font-weight: bold; color: #555; }
        .skills-container { width: 100%; }
        .skill-category { font-weight: bold; margin-top: 10px; }
        .skill-name { padding: 5px 0; }
    </style>
</head>
<body>

    <div class="header">
        <h1>{{ $profile->full_name }}</h1>
        <h2>{{ $profile->job_title }}</h2>
        <div class="contact-info">
            {{ $profile->location }} | {{ $profile->phone }} | {{ $profile->email }} | {{ $profile->website }}
        </div>
    </div>

    <div class="section">
        <div class="section-title">Ringkasan Profesional</div>
        <div class="content">
            <p>{{ $profile->summary }}</p>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Pengalaman Kerja</div>
        <div class="content">
            @foreach($experiences as $exp)
                <div class="job">
                    <span class="period">{{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Saat Ini' }}</span>
                    <div class="job-title">{{ $exp->job_title }}</div>
                    <div class="company">{{ $exp->company_name }}</div>
                    <p>{!! nl2br(e($exp->description)) !!}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <div class="section-title">Pendidikan</div>
        <div class="content">
            @foreach($educations as $edu)
                <div class="edu">
                    <span class="period">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Saat Ini' }}</span>
                    <div class="degree">{{ $edu->degree }}</div>
                    <div class="institution">{{ $edu->institution }} - {{ $edu->field_of_study }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <div class="section-title">Keahlian</div>
        <div class="content">
            <table class="skills-container">
                @foreach($skills->groupBy('category') as $category => $skillGroup)
                    <tr>
                        <td width="25%"><div class="skill-category">{{ $category }}</div></td>
                        <td>
                            @foreach($skillGroup as $skill)
                                <span class="skill-name">{{ $skill->name }}{{ !$loop->last ? ',' : '' }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>