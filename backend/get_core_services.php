<?php
require_once __DIR__ . '/config.php';

function get_core_services() {
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        // In production, you might want to log this instead of showing it
        error_log("Connection failed: " . $conn->connect_error);
        return [];
    }

    $sql = "SELECT 
                m.ID AS CoreID,
                m.ServiceName AS MainService,
                m.Description,
                d.ServiceName AS SubService,
                d.Priority
            FROM 
                M_CoreService m
            LEFT JOIN 
                D_CoreService d 
            ON 
                m.ID = d.CoreServiceID
            WHERE 
                m.Deleted = 0
                AND (d.Deleted = 0 OR d.Deleted IS NULL)
            ORDER BY 
                m.ID, d.Priority DESC";

    $result = $conn->query($sql);

    $services = [];

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $coreId = $row['CoreID'];
            
            // If this core service hasn't been added yet, add it
            if (!isset($services[$coreId])) {
                $services[$coreId] = [
                    'id' => $coreId,
                    'name' => $row['MainService'],
                    'description' => $row['Description'],
                    'sub_services' => []
                ];
            }

            // Add the sub-service if it exists
            if ($row['SubService']) {
                $services[$coreId]['sub_services'][] = [
                    'name' => $row['SubService'],
                    'priority' => (bool)$row['Priority']
                ];
            }
        }
    }

    $conn->close();

    return array_values($services); // Return indexed array
}
?>
