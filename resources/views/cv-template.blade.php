<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $profile->full_name }}</title>
    <style>
        /* Reset & Font Dasar */
        body { 
            font-family: 'Didot' ; /* Font paling aman untuk karakter unicode di PDF */
            font-size: 12pt; 
            line-height: 1.5; 
            color: #333333; 
            margin: 0;
        }

        /* Struktur Utama */
        .page {
            padding: 30px;
        }

        /* Header */
        .header .full-name { 
            font-size: 24pt; 
            font-weight: bold; 
            color: #2c3e50; 
            margin: 0;
            text-align: center;
        }
        .header .job-title { 
            font-size: 16pt; 
            color: #34495e; 
            margin: 5px 0 10px 0;
            text-align: center;
        }
        .header .contact-info {
            text-align: center;
            font-size: 9pt;
            margin-bottom: 25px;
            color: #555;
        }

        /* Judul Bagian */
        .section-title {
            font-size: 16pt;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 5px;
            margin-bottom: 15px;
            margin-top: 20px;
        }

        /* Item Konten */
        .item {
            margin-bottom: 15px;
        }
        .item-header {
            font-size: 14pt;
            font-weight: bold;
        }
        .item-subtitle {
            font-style: italic;
            color: #555555;
            margin-bottom: 5px;
        }
        .item-date {
            font-weight: normal;
            font-style: italic;
        }
        .item-description {
            font-size: 12pt;
            text-align: justify;
        }

        /* Layout Tabel Anti-Gagal untuk Item dengan Tanggal di Kanan */
        .item-table {
            width: 100%;
            border-spacing: 0;
        }
        .item-table .title-cell {
            width: 80%;
            vertical-align: top;
        }
        .item-table .date-cell {
            width: 20%;
            vertical-align: top;
            text-align: right;
            font-size: 9pt;
        }

        /* Layout Keahlian */
        .skills-table {
            width: 100%;
        }
        .skills-table td {
            vertical-align: top;
            padding-bottom: 8px;
        }
        .skill-category {
            font-weight: bold;
            width: 120px; /* Lebar tetap untuk kategori */
        }
    </style>
</head>
<body>

    <div class="page">
        <div class="header">
            <p class="full-name">{{ $profile->full_name }}</p>
            <p class="job-title">{{ $profile->job_title }}</p>
            <p class="contact-info">
                {{ $profile->location }} | {{ $profile->phone }} | {{ $profile->email }}
                @if($profile->website) | {{ $profile->website }} @endif
            </p>
        </div>

        <div class="section">
            <div class="section-title">Ringkasan Profil</div>
            <p class="item-description">{{ $profile->summary }}</p>
        </div>

        <div class="section">
            <div class="section-title">Pengalaman</div>
            @forelse($experiences as $exp)
                <div class="item">
                    <table class="item-table">
                        <tr>
                            <td class="title-cell">
                                <div class="item-header">{{ $exp->job_title }}</div>
                                <div class="item-subtitle">{{ $exp->company_name }} | {{ $exp->location }}</div>
                            </td>
                            <td class="date-cell">
                                <div class="item-date">{{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Saat Ini' }}</div>
                            </td>
                        </tr>
                    </table>
                    <p class="item-description">{{ $exp->description }}</p>
                </div>
            @empty
                <p>Belum ada pengalaman yang ditambahkan.</p>
            @endforelse
        </div>

        <div class="section">
            <div class="section-title">Proyek Unggulan</div>
            @forelse($projects as $project)
                <div class="item">
                    <div class="item-header">{{ $project->title }}</div>
                    <div class="item-subtitle">{{ $project->category }}</div>
                    <p class="item-description">{{ $project->description }}</p>
                    <p style="font-size: 9pt; font-style: italic; color: #555;">Teknologi: {{ is_array($project->technologies) ? implode(', ', $project->technologies) : $project->technologies }}</p>
                </div>
            @empty
                <p>Belum ada proyek yang ditambahkan.</p>
            @endforelse
        </div>
        
        <div class="section">
            <div class="section-title">Pendidikan</div>
            @forelse($educations as $edu)
                <div class="item">
                     <table class="item-table">
                        <tr>
                            <td class="title-cell">
                                <div class="item-header">{{ $edu->institution }}</div>
                                <div class="item-subtitle">{{ $edu->degree }} - {{ $edu->field_of_study }}</div>
                            </td>
                            <td class="date-cell">
                                <div class="item-date">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Sekarang' }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
            @empty
                <p>Belum ada riwayat pendidikan yang ditambahkan.</p>
            @endforelse
        </div>

        <div class="section">
            <div class="section-title">Keahlian</div>
            <table class="skills-table">
                @forelse($skills->groupBy('category') as $category => $skillGroup)
                    <tr>
                        <td class="skill-category">{{ $category }}</td>
                        <td>
                            {{ $skillGroup->pluck('name')->implode(', ') }}
                        </td>
                    </tr>
                @empty
                    <tr><td>Belum ada keahlian yang ditambahkan.</td></tr>
                @endforelse
            </table>
        </div>
        
        <div class="section">
            <div class="section-title">Sertifikat</div>
             @forelse($certificates as $cert)
                <div class="item">
                    <table class="item-table">
                        <tr>
                            <td class="title-cell">
                                <div class="item-header">{{ $cert->title }}</div>
                                <div class="item-subtitle">Diterbitkan oleh: {{ $cert->issuer }}</div>
                            </td>
                            <td class="date-cell">
                                <div class="item-date">{{ $cert->issued_year }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
            @empty
                <p>Belum ada sertifikat yang ditambahkan.</p>
            @endforelse
        </div>

    </div>
</body>
</html>