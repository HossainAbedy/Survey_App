<?php

namespace App\Exports;

use App\SurveyForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SurveyFormExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function collection()
    {
        return SurveyForm::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Surveyed By',
            'Organization Name',
            'Owner Name',
            'Present Address',
            'Permanent Address',
            'Cell No',
            'Concern Person',
            'Organization Cell No',
            'Bussiness Type',
            'Bussiness Year',
            '1.How long you are dealing with Hi-vallay product?',
            '2.Are you dealing with other company?',
            '2.Specify If Yes',
            '3.How do you feel about Quality of Hi-vallay fan?',
            '4.What does the customer except from Hi-vally in term of quality?',
            '6.What type of promotional activity do you prefer with Hi-vally product?',
            '5.How do you rate the promotional activities given y Hi-vally?',
            '6.What type of promotional activity do you prefer with Hi-vally product?',
            '6.Other?',
            '7.Whether the expected Quantity of Hi-vally is is supplied to you in time?',
            '8.What do you feel about credit period given by Hi-Vally?',
            '9.What do you feel about the employee dealing with you in Hi-Vally?',
            '10.What are the factors that you expects from Hi-Vally Products?',
            '10.Services',
            '11.How much do you spend in winter Booking?',
            '12.Do you have any complains about Hi-Vallay Product?',
            '12.Specify If Yes',
            '13.Do you recommend your customer Hi-Vallay Product?',
            '13.Specify If No',
            '14.What do you feel about after Sales Service Given y Hi-Vally?',
            '14.Null',
            '15.Last Balance',
            '16.Do you have any suggestion in improve the quality of Hi-Vally product?',
            '16.Specify If Yes',
            'Created At',
            'Updated at'
        ];
    }
}
