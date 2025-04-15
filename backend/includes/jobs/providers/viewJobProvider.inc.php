<?php
require_once __DIR__ . '/modelJobProvider.inc.php'; // Include the model to access the data

// function providerJobListingsView()
// {
//     $jobListings = getProviderJobListings();

//     $companyName = '';
//     if (!empty($jobListings)) {
//         // Use the company name from the first job listing
//         $companyName = htmlspecialchars($jobListings[0]['provider_company']);  // Using provider_company
//     }

//     echo "<h2 style='text-align:center; margin: 40px 0 20px; font-family: Arial, sans-serif; color: #333;'>Job Listed By: {$companyName}</h2>";

//     if (empty($jobListings)) {
//         echo "<p style='text-align:center; color:gray;'>No job listings available at the moment.</p>";
//         return;
//     }

//     echo <<<HTML
//     <div style="overflow-x:auto; max-width: 95%; margin: 0 auto; font-family: Arial, sans-serif;">
//         <table style="
//             width: 100%;
//             border-collapse: collapse;
//             box-shadow: 0 4px 12px rgba(0,0,0,0.05);
//             border-radius: 10px;
//             overflow: hidden;
//         ">
//             <thead style="background-color: #4CAF50; color: white;">
//                 <tr>
//                     <th style="padding: 14px;">Job Title</th>
//                     <th style="padding: 14px;">Company</th>
//                     <th style="padding: 14px;">Location</th>
//                     <th style="padding: 14px;">Skills</th>
//                     <th style="padding: 14px;">Description</th>
//                     <th style="padding: 14px;">Posted By</th>
//                     <th style="padding: 14px;">Contact</th>
//                 </tr>
//             </thead>
//             <tbody>
// HTML;

//     foreach ($jobListings as $job) {
//         echo "<tr style='transition: background 0.3s ease;' 
//                 onmouseover=\"this.style.background='#f9f9f9';\" 
//                 onmouseout=\"this.style.background='white';\">";

//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($job['job_title']) . "</td>";
//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($job['provider_company']) . "</td>";  // Using provider_company
//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($job['location']) . "</td>";
//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($job['required_skills']) . "</td>";
//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee; max-width: 250px;'>" . nl2br(htmlspecialchars($job['job_description'])) . "</td>";
//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($job['provider_username']) . "<br><small>(" . htmlspecialchars($job['provider_company']) . ")</small></td>";
//         echo "<td style='padding: 12px; border-bottom: 1px solid #eee;'><a href='mailto:" . htmlspecialchars($job['contact_email']) . "' style='color: #4CAF50; text-decoration: none;'>" . htmlspecialchars($job['contact_email']) . "</a></td>";

//         echo "</tr>";
//     }

//     echo <<<HTML
//             </tbody>
//         </table>
//     </div>
// HTML;
// }
function providerJobListingsView()
{
    $jobListings = getProviderJobListings();

    $companyName = '';
    if (!empty($jobListings)) {
        $companyName = htmlspecialchars($jobListings[0]['provider_company']);
    }

    echo "<h2 style='text-align:center; margin: 20px; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; color: #2c3e50;'>Job Listings by: {$companyName}</h2>";

    if (empty($jobListings)) {
        echo "<p style='text-align:center; color: #888; font-size: 18px;'>No job listings available at the moment.</p>";
        return;
    }

    echo <<<HTML
    <div style="overflow-x:auto; max-width: 95%; margin: 0 auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <table style="
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            overflow: hidden;
        ">
            <thead style="background-color: #2c3e50; color: white;">
                <tr>
                    <th style="padding: 14px 12px; text-align: left;">Job Title</th>
                    <th style="padding: 14px 12px; text-align: left;">Company</th>
                    <th style="padding: 14px 12px; text-align: left;">Location</th>
                    <th style="padding: 14px 12px; text-align: left;">Skills</th>
                    <th style="padding: 14px 12px; text-align: left;">Description</th>
                    <th style="padding: 14px 12px; text-align: left;">Posted By</th>
                    <th style="padding: 14px 12px; text-align: left;">Contact</th>
                </tr>
            </thead>
            <tbody>
HTML;

    foreach ($jobListings as $job) {
        echo "<tr style='background-color: white; transition: background 0.3s ease;' 
                onmouseover=\"this.style.background='#f4f6f8';\" 
                onmouseout=\"this.style.background='white';\">";

        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1; font-weight: 500;'>" . htmlspecialchars($job['job_title']) . "</td>";
        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1;'>" . htmlspecialchars($job['provider_company']) . "</td>";
        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1;'>" . htmlspecialchars($job['location']) . "</td>";
        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1;'>" . htmlspecialchars($job['required_skills']) . "</td>";
        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1; max-width: 250px;'>" . nl2br(htmlspecialchars($job['job_description'])) . "</td>";
        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1;'>" . htmlspecialchars($job['provider_username']) . "<br><small style='color: #7f8c8d;'>(" . htmlspecialchars($job['provider_company']) . ")</small></td>";
        echo "<td style='padding: 12px; border-bottom: 1px solid #ecf0f1;'>
                <a href='mailto:" . htmlspecialchars($job['contact_email']) . "' style='color: #2980b9; text-decoration: none; font-weight: 500;'>
                    " . htmlspecialchars($job['contact_email']) . "
                </a>
              </td>";

        echo "</tr>";
    }

    echo <<<HTML
            </tbody>
        </table>
    </div>
HTML;
}
