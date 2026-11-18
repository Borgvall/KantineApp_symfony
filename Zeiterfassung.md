# Zeiterfassung

Die Zeiterfassung der Teilnehmer bei der Impuls Reha erfolgt digital.
Jeder Teilnehmer bekommt zu Beginn einen Teilnehmerausweis mit einem QR Code, welcher eindeutig zugeordnet wird.
Verteilt über die Standorte stehen die sogenannten Clienten mit einem Scanner, welche jeden Scan über eine Web-API an dieses Framework senden.
Falls sich die Clienten nicht über die Web-API verbinden können, speichern sie die Scans in einer lokalen SQLite Datenbank und senden diese nach dem Wiederaufbau der Verbindung in einem Rutsch.
Innerhalb des Frameworks in diesem Repository, werden die Scans heuristisch als Ein- bzw. Auscheckvorgänge erkannt und mit Zeitstempel in einer MariaDB gespeichert.
Die Aufbereitung der Einträge zu einer Anwesenheitsliste erfolgt ebenfalls in diesem Framework.

## Die Clienten

Der Quellcode von den Clienten findet man auf dem [Github-Repository](https://github.com/zeiterfassungClients/ClientAPI).
Sie sind in Python geschrieben und 
