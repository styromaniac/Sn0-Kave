<!-- Cam Kave Copyright Alex "Styromaniac" Goven 2018-2023; Licensed MIT https://www.mit.edu/~amini/LICENSE.md -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cam Kave</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Cam Kave">
    <meta name="apple-mobile-web-app-title" content="Cam Kave">
    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="1536x1536" href="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="1536x1536" href="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/favicon.png">
    <link rel="manifest" type="application/manifest+json" href="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/manifest.json">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />
    <script async src="https://cdn.plyr.io/3.7.3/plyr.js"></script>
    <base href="./" target="_top">

    <style>
        .plyr {
	        --plyr-color-main: #3060c0;
            --plyr-video-background:none;
            height:100%
        }

 @media (pointer: fine) {
        ::-webkit-scrollbar {
            width: 8px
        }
    }

 @media (pointer: coarse) {
        ::-webkit-scrollbar {
            width: 0px
        }
    }

        ::-webkit-scrollbar-track {
            background: 0 0
        }

        ::-webkit-scrollbar-thumb {
            background: radial-gradient(transparent,#248) center no-repeat;
            border-radius: 4px
        }

        .bar,.bat {
            height: 45px
        }

        .bat {
            bottom: 0
        }

        .bar,#list {
            text-align: center
        }

        .bar,html {
            overflow: hidden
        }

        .bar {
            background: linear-gradient(to bottom,#36c,#060c18,#0c1830);
            border-radius: 23px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 2
        }

        .bat {
            content: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhLS0gQ3JlYXRlZCB3aXRoIElua3NjYXBlIChodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy8pIC0tPgo8c3ZnCiAgICB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiCiAgICB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIgogICAgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIgogICAgeG1sbnM6aW5rc2NhcGU9Imh0dHA6Ly93d3cuaW5rc2NhcGUub3JnL25hbWVzcGFjZXMvaW5rc2NhcGUiCiAgICB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiCiAgICB4bWxuczpuczE9Imh0dHA6Ly9zb3ppLmJhaWVyb3VnZS5mciIKICAgIGlkPSJzdmcyIgogICAgdmlld0JveD0iMCAwIDU2My42OCAzNjYuMTIiCiAgICB2ZXJzaW9uPSIxLjEiCiAgPgogIDxkZWZzCiAgICAgIGlkPSJkZWZzNCIKICAgID4KICAgIDxmaWx0ZXIKICAgICAgICBpZD0iZmlsdGVyNjE4NS0zIgogICAgICAgIGNvbG9yLWludGVycG9sYXRpb24tZmlsdGVycz0ic1JHQiIKICAgICAgPgogICAgICA8ZmVHYXVzc2lhbkJsdXIKICAgICAgICAgIGlkPSJmZUdhdXNzaWFuQmx1cjYxODctMCIKICAgICAgICAgIHN0ZERldmlhdGlvbj0iMi43MTQ0ODA0IgogICAgICAvPgogICAgPC9maWx0ZXIKICAgID4KICAgIDxsaW5lYXJHcmFkaWVudAogICAgICAgIGlkPSJsaW5lYXJHcmFkaWVudDYzMzktMyIKICAgICAgICB5Mj0iNjA2LjM3IgogICAgICAgIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIgogICAgICAgIHgyPSItMTg1LjMyIgogICAgICAgIGdyYWRpZW50VHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTEuMjY3NiA1LjA3MDYpIgogICAgICAgIHkxPSI3MjEuNzIiCiAgICAgICAgeDE9Ii0xNjcuNTciCiAgICAgID4KICAgICAgPHN0b3AKICAgICAgICAgIGlkPSJzdG9wNjMzNS0zIgogICAgICAgICAgc3R5bGU9InN0b3AtY29sb3I6IzAwMmIyYiIKICAgICAgICAgIG9mZnNldD0iMCIKICAgICAgLz4KICAgICAgPHN0b3AKICAgICAgICAgIGlkPSJzdG9wNjMzNy03IgogICAgICAgICAgc3R5bGU9InN0b3AtY29sb3I6IzAwMmIyYjtzdG9wLW9wYWNpdHk6MCIKICAgICAgICAgIG9mZnNldD0iMSIKICAgICAgLz4KICAgIDwvbGluZWFyR3JhZGllbnQKICAgID4KICAgIDxyYWRpYWxHcmFkaWVudAogICAgICAgIGlkPSJyYWRpYWxHcmFkaWVudDYzNDktOCIKICAgICAgICBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIKICAgICAgICBjeT0iNjM3LjIzIgogICAgICAgIGN4PSItMTgwLjk5IgogICAgICAgIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoLjYzMTM3IC0uMDIzMDk5IC4wMjMwOTMgLjYzMTIwIC03OS40MjIgMjUzLjIxKSIKICAgICAgICByPSIxNjQuNjQiCiAgICAgID4KICAgICAgPHN0b3AKICAgICAgICAgIGlkPSJzdG9wNjM0NS0xIgogICAgICAgICAgc3R5bGU9InN0b3AtY29sb3I6IzAwN2ZkNCIKICAgICAgICAgIG9mZnNldD0iMCIKICAgICAgLz4KICAgICAgPHN0b3AKICAgICAgICAgIGlkPSJzdG9wNjM0Ny0xIgogICAgICAgICAgc3R5bGU9InN0b3AtY29sb3I6IzAwN2ZkNDtzdG9wLW9wYWNpdHk6MCIKICAgICAgICAgIG9mZnNldD0iMSIKICAgICAgLz4KICAgIDwvcmFkaWFsR3JhZGllbnQKICAgID4KICAgIDxsaW5lYXJHcmFkaWVudAogICAgICAgIGlkPSJsaW5lYXJHcmFkaWVudDY2MjgiCiAgICAgICAgeTI9IjcxMC44MSIKICAgICAgICB4bGluazpocmVmPSIjbGluZWFyR3JhZGllbnQ2MTU1LTAiCiAgICAgICAgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiCiAgICAgICAgeDI9IjQyNC4xNyIKICAgICAgICB5MT0iNjA3Ljk2IgogICAgICAgIHgxPSI0MDAuODMiCiAgICAvPgogICAgPGxpbmVhckdyYWRpZW50CiAgICAgICAgaWQ9ImxpbmVhckdyYWRpZW50NjE1NS0wIgogICAgICA+CiAgICAgIDxzdG9wCiAgICAgICAgICBpZD0ic3RvcDYxNTctOCIKICAgICAgICAgIHN0eWxlPSJzdG9wLWNvbG9yOiNmZmZmZmYiCiAgICAgICAgICBvZmZzZXQ9IjAiCiAgICAgIC8+CiAgICAgIDxzdG9wCiAgICAgICAgICBpZD0ic3RvcDYxNTktNSIKICAgICAgICAgIHN0eWxlPSJzdG9wLWNvbG9yOiNmZmZmZmY7c3RvcC1vcGFjaXR5OjAiCiAgICAgICAgICBvZmZzZXQ9IjEiCiAgICAgIC8+CiAgICA8L2xpbmVhckdyYWRpZW50CiAgICA+CiAgICA8Y2xpcFBhdGgKICAgICAgICBpZD0iY2xpcFBhdGg2MTUxLTY0IgogICAgICA+CiAgICAgIDxwYXRoCiAgICAgICAgICBpZD0icGF0aDYxNTMtNjciCiAgICAgICAgICBzdHlsZT0ic3Ryb2tlOiNmZmZmZmY7c3Ryb2tlLXdpZHRoOjI7ZmlsbDojZmZmZmZmIgogICAgICAgICAgZD0ibTQzOS4yMiA1ODcuNTJhMTY0LjkzIDc2LjYzOSAwIDEgMSAtMzI5Ljg2IDAgMTY0LjkzIDc2LjYzOSAwIDEgMSAzMjkuODYgMHoiCiAgICAgICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5OS45MDIgNTMuODU4KSIKICAgICAgLz4KICAgIDwvY2xpcFBhdGgKICAgID4KICA8L2RlZnMKICA+CiAgPGcKICAgICAgaWQ9ImxheWVyMSIKICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTg4Ljc2MyAtNjEuOTAxKSIKICAgID4KICAgIDxnCiAgICAgICAgaWQ9Imc2NDM4IgogICAgICAgIHRyYW5zZm9ybT0ibWF0cml4KDEuNjA4NyAwIDAgMS42MDg3IDY1MC41NyAtODgxLjY5KSIKICAgICAgPgogICAgICA8cGF0aAogICAgICAgICAgaWQ9InBhdGg2MjYyIgogICAgICAgICAgc3R5bGU9ImZpbHRlcjp1cmwoI2ZpbHRlcjYxODUtMyk7ZmlsbDojMDAwMDAwIgogICAgICAgICAgZD0ibS0xMTIuOCA1OTQuNDVjLTMuOTE2NS0wLjAyNTUtMi45MzY2IDQuODg5Mi0wLjkzNzUgNi43NSA2LjUwMzQgMTMuMzE1IDQuNTc3OSAyOS4xNDctMi41MDIgNDEuNzk4LTcuMTIyNCAxMy45MDktMTguNDk3IDI1LjcxNC0zMS40NjcgMzQuNDUyLTUuMTc4MSAxLjc0OTQtMTEuNTc0IDYuNzU1NC0xNy4wMzEgMy41LTIuNjA4Ny0zLjA5NjktMS45OS03LjkwODMtNC4xODc1LTExLjQ2OS0xLjExMDItMS44ODcyLTIuMjczOC03Ljg2MjktNS4zNzUtNS44MTI1LTIuMzc0NCA1LjAxOTQgMC4zOTI4MSAxMi44MzgtNi4zNDM4IDE1LjI4MS01LjA2OTkgMi42MDY3LTExLjc0MSAxLjMzNDktMTQuNDM4LTMuOTA2Mi0xLjQzMjgtMi45MDgzLTYuMjQ1OS0yLjg5NzktNS42MjUgMS4wMzEyLTAuNDA3NjMgNS44OTU5IDMuMzQzIDExLjI0NiAzLjQwNjIgMTYuODQ0LTIuNDA2MiA0LjUzNzgtOC43NTI4IDEuMjk2OS0xMi43MTkgMS4zMTI1LTI1Ljg4Ny0xLjk2MTYtNTIuNTExLTEyLjczOC02Ny40MzgtMzQuODEyLTQuODEyMS02LjExOTctNS45Nzg3LTE0LjU2MS02LjE4NzUtMjIuMDk0IDAuMDA3LTMuODI5OSAzLjQ5OTMtOC42OTExIDAuOTY4NzUtMTIuMDk0LTMuNzM0My0wLjA5MjUtNi4zOTM0IDQuMTQ3OS05LjI0MTIgNi4xNTEyLTE3LjAxNSAxNS41OC0yNy43NjEgMzYuNzQ3LTM1Ljk0NiA1OC4xMy00LjE5MjIgMTIuNDE4LTcuNjgzMSAyNS4yNzgtOS42MjUgMzguMzQ0LTAuODExMTQgNS4wNjQzIDAuNjY3NyA3LjIwMTYgNC44NTMzIDMuMTQ5MSA4LjY0NzEtNS4yMzQgMTYuNjE4LTEyLjEzOSAyNy4xNzktMTMuMTgyIDkuNDg0Mi0yLjM1NDUgMTkuODg1LTEuOTY0MiAyOC4wNjEgMy44NzY1IDQuMzkzNSAzLjMxOTcgNS44NTMxIDguOTk3NCA0LjU5MzggMTQuMjUgMC4xNjA2NyAzLjI5NDItMi44OTk3IDguODQyNiAwLjgxMjUgMTAuODQ0IDQuNzMxNS0xLjE3MzkgNy43NTc5LTYuMzk3OSAxMi4yNS04LjMxMjUgMTAuMDA4LTYuMTc5IDIzLjgwMy0xMS40MDUgMzQuNjg4LTQuMzQzOCA2LjM5NDkgMi42OTExIDkuMjczMyA5LjY5NjEgOS43NSAxNi4zNDQgMC4yMzE0NyA0Ljg3NDYtMC4zMTcwMSA5Ljc1MzcgMC4wOTM3IDE0LjYyNSA1LjkxNTEtNS45NTIxIDEzLjcyNi0xNC40NzYgMjMtMTEuMjgxIDIxLjkwMSA4LjAxNzQgMzQuMTE4IDI5Ljg3IDQyLjE5MiA1MC41NzggMS45NDEgNC4xMTYyIDEuOTcyOS02LjUyOTIgMC42MjU2Ni04LjcxMTctMy43ODYtMTkuMjYyLTMuOTIwOC00MC41NDcgNS43NDQ0LTU4LjA1NCA0LjYwMzgtNi43NDY1IDExLjU4NS0xMy44OTkgMjAuNTYyLTExLjgxMiA2Ljc2NTMgMC43NzkwNyAxMS45NTYgNS40MDk0IDE2LjIxOSAxMC4yMTkgMi41MDU2IDIuMTAyNyAzLjg5NTgtMS43MDg5IDIuNzgxMi0zLjcxODgtMy43NzExLTkuMTctMS43NDQ0LTIwLjQ5NyA1LjIxODgtMjcuNTk0IDguODE5Ni04LjY2MDUgMjIuNDEtNS44MjUyIDMyLjUzMS0xLjU5MzggNC43ODc0IDEuMDEyIDguNjI4NSA1LjQ2OTQgMTMuNzgxIDQuOTY4OC01LjA5MTktMTAuODI5LTEyLjEyOS0yMS41Ny0xMS42NTYtMzMuOTM4IDAuNDM5NDctOC4wMDk1IDUuMjA1Mi0xNi4wOTkgMTMuNDA2LTE4LjI1IDguNzkzNS00LjY5MDIgMTkuODExLTMuODYxMSAyOS4xNjMtMS41NjAzIDUuMTk3OCAxLjM2NDcgMTAuMzg0IDUuMDA5OSAxNS45MzEgMy42MjI4LTcuMTAwOS04Ljc5MzItMTQuNDI1LTE3LjUyMS0yMy4wOTQtMjQuNDY5LTIwLjMzOS0xNy44OTEtNDQuNjA3LTMyLjE3Ny03MS40MzgtMzcuMTI1LTQuMDYzMi0wLjE0MTczLTguMzIxOC0yLjExNTUtMTIuNTYyLTEuOTM3NXptLTYwLjI1IDEwMS40N2MwLjU3NzYgMS42ODU5LTMuMDIzNSA0Ljc0MDItNC4wOTM4IDMuMTg3NSAwLjc2NTA5LTEuNTM4MyAyLjQ2NjQtMi44MzczIDQuMDkzOC0zLjE4NzV6bS0xMS40MzggMi4zNzVjMi40ODk4LTAuMDI5NiAyLjM5MjIgNC41ODI4LTAuNTYyNSAyLjYyNS0yLjc2NDItMC41MTQ5OS0xLjczMjQtMi41ODcxIDAuNTYyNS0yLjYyNXoiCiAgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgxIDAgMCAuOTg3NjIgMCA3LjM1OTMpIgogICAgICAvPgogICAgICA8cGF0aAogICAgICAgICAgaWQ9InBhdGg2MzMxIgogICAgICAgICAgc3R5bGU9ImZpbGw6dXJsKCNsaW5lYXJHcmFkaWVudDYzMzktMykiCiAgICAgICAgICBkPSJtLTE0OS4yNiA3OTguNzhjLTIuMTEyOS00LjQzMjEtNC41MTg1LTEwLjU5OS03LjIwMjItMTUuMDE2LTMuMDE1NS02LjI3NTYtNy4zODUtMTIuOTg1LTEyLjAwNC0xNy44MzQtNi4yNDUzLTcuODkzMy0xNS4yODItMTMuNzgyLTI0LjcxMi0xNy4wNy04LjU1OTYtMS4yOTI3LTE1LjMxNiA1LjE1NzktMjAuNzUyIDEwLjcyOC0wLjQ0ODc1LTcuNDc2NCAxLjYzMTktMTYuNTE3LTMuMzQzOS0yMy4wNzUtMC44MDkxNC00LjA5NjYtNi4wMDc5LTUuNjA3Mi04LjM5NzItNy43MzM0LTUuNTY4NC0yLjQ3MjItMTEuNzczLTMuMjc3Ni0xNy44MTgtMS40NzY2LTUuNDY3NiAxLjQ2MzItMTAuNTQyIDMuMjUxLTE1LjQ1NSA2LjQ1Ny00LjMwNTkgMi40MDE4LTcuNDc0NCA1LjQzMTgtMTEuNTUzIDguNTU5My01LjI1NzggMS44NzMyIDIuODQ0NS0xNi4wOC0yLjU2NDQtMjAuNTcyLTEuOTIwOC01LjM5MzgtOC41MjUyLTYuNTEyNC0xMy4wMjctOC45MjM3LTkuMDE4Ny0xLjc4MjEtMTcuOTIzIDAuMDk4OS0yNi40MjEgMi40NjY3LTQuNzAxNyAxLjAxMDMtOC44OTU1IDQuNDg1OS0xMi45MDQgNi44NzQxLTMuODEzNCAyLjYzNTQtNy4wMzIgNC4zOTUtMTAuNjI1IDYuNzkwNy0wLjgzMjEzLTguMTgxNyAyLjUxOC0xNS44MjMgMy44MzI1LTIzLjgzOCAxLjI3MjctNS42ODkxIDMuNjI2OS0xMS4yMTUgNC43ODktMTYuOTc2IDIuMzY1My00LjY1OTkgMy44OTg0LTkuNjc4IDUuOTA0OC0xNC4yOTYgMy4wNDIxLTYuMDkzOCA1Ljk5NDItMTIuMDE2IDkuMDAyNy0xOC4wMiAyLjQwMTgtMy42MTc0IDUuNDc0NC04LjMwNyA4LjEwMjQtMTIuMTYzIDIuNzg3NC0zLjI3NzcgNS4xNTM2LTYuNzk2MSA4LjQwMjUtOS45MTA3IDMuOTE2Ny0zLjkyNzUgNy42MDc2LTcuOTIwNiAxMi4xNTQtMTAuODEyIDQuMTctMi45NTQtMC45OTM3MyAxMC4yMDItMC4zNDI5NiAxMy41NjUgMS4xMzU2IDUuNzcxOCAxLjQzOCAxMi4zMTEgNC42OTQzIDE3LjM2OSAyLjQ0NzUgMy41NTYzIDQuNjE1NiA2Ljc1NjIgNy42NTIzIDkuOTEwNyA2LjQ5OTUgNy4zNjggMTQuNDI5IDEzLjE2NSAyMy4yNTcgMTcuNTkzIDQuOTA3NSAyLjU2NSAxMC4wODkgNC4yNzQxIDE1LjMwNSA1Ljk4MjYgOC4yMjIzIDEuODQ2NiAxNi41NjEgNC4xNiAyNS4zNTggNC4zNTQ3IDcuNjQ2NiAyLjE1MyAxNS4zMjMgMS40NjI5IDEwLjc0Ni04LjIwMDktMy4xMTA4LTkuODEwNS0zLjY5MzEtMTguNzY0IDMuODA4NC05LjA2NzggMy45OTY2IDUuOTQ2OCAxOC4wNzQgMy4yMjEzIDE4LjgwOC00Ljc1NjMgMC45MDc5LTYuMjk0MiAwLjI5NDQ2LTE4LjYwMiA3LjY3NTggMy4zOTQ5LTAuMTA2MjggNC4wNTIyIDIuNzg2NyA4LjM0MDkgMTAuODc5IDUuNDk4OCA0Ljg3OTQtMi4wMzA1IDYuOTQ1Mi0yLjMxMDQgMTEuNTUxLTUuMTg4NSAzLjU2NjItMi42ODQ3IDcuMTIwNC01Ljc3NTUgMTAuMTk5LTguNDEzMiA1LjY1ODYtNS42NTc5IDExLjYwMy0xMi4yMTIgMTYuMjA5LTE5LjIxNyAzLjY0ODMtNi44ODg0IDguMDYwMS0xNC4zOTggOC44MTItMjIuNjM2IDIuNDE0MS04LjU4MDEgMC4wMzctMTcuOTU2LTMuMTk4MS0yNS43NTktNi43NzUzLTkuODA0NCA3LjU5MDctMy41NDU0IDEyLjU0Mi0zLjU2MDYgNi43OTQ5IDEuMjE0OCAxMy4zNzUgMi43MDcgMTkuNjU2IDUuNTgyNCA1LjA0MzYgMS42MTI1IDEwLjIyOCAzLjg2MjggMTQuODU0IDYuNDMwNiA1LjM2NjQgMi4xMzc4IDEwLjY4NSA2LjA4ODggMTUuOTA1IDkuMDA5OCAzLjYwMzIgMi40MzM3IDcuMTY0MyA1LjEzNzggMTAuOTUzIDcuOTU4NiA0LjQ5NTkgMy4zNzU3IDguNzA2NCA2Ljc0ODYgMTIuNTI5IDEwLjg0OSAzLjQ5NzkgMS43NTcgNS45NzMyIDUuNDU3NyA4LjkwMzggOC4yMjE0IDMuNDc3NCA0LjEzNDkgNi45MjY5IDguMDI2NiAxMC4xOTkgMTIuMDEzLTMuNDQ0MiAwLjg2MTcyLTEyLjc4LTQuMDQwMi0xOC4zMzQtNS4wMjI4LTguNzA0My0wLjYzNzg3LTE3LjctMS43NDg5LTI1LjU1NiAyLjgxNDItNi42MjczIDEuOTAxNC0xMi4zNjcgOC4wOTk1LTEzLjA1OCAxNS4xMjMtMi43NTg1IDguMzIzOSAxLjQ1MDYgMTYuMDgyIDMuNTA2NiAyMy42ODcgMi43MDEyIDQuMjMwNiA0LjY3ODQgOS4wMjYgNi44MDU3IDEzLjI1My0yLjgzMzggMC4yMjQ5LTguNjQzMy00LjUzMTUtMTIuOTc5LTUuMTAxNC02LjUwMzMtMi43NjczLTE0LjI2NS00LjkxNTUtMjEuODMyLTMuNDkyOC01LjQ5MTIgMC45OTcxMi05Ljk3NTcgNC4wMDk5LTEzLjUwNCA4LjU5NDItMy4yOTcgNi4wMTgyLTYuMjMxOCAxNC4zNTYtMy42OTE3IDIxLjQ2IDIuNTI4NyA4LjIyMzggMS40NTMxIDkuNDIyOC0zLjgxMDYgMy4wMTY5LTMuODM0Mi00LjA3MjEtOC43NzQtNi4wMjItMTQuMTA0LTYuOTA3NS01LjI0NzgtMC44Mzg4Ny0xMS41NDYgMS40Njk5LTE1LjAwNCA2LjAwNjUtNy44ODM0IDYuNjg0OS0xMC40MiAxNy4xOTMtMTIuNDEgMjYuNTc5LTMuMTYzNiAxNC45LTAuNDMzNDMgMzAuMjg1IDIuMjA3MyA0NC44OTlsLTAuMzAwMDggMS4wNTExem0tMzEuODU2LTEwMS41NWMtMS4wNDk2LTcuNjA1NS0xMS43NjUgMC4xMTIzMi0yLjA2NDUgMS4zOTM0IDEuMDIyOSAwLjQzMzAyIDEuNzgzMy0wLjk3NjE1IDIuMDY0NS0xLjM5MzR6bTcuNTQ4OS0wLjg2ODQ4YzUuMzcwMi02LjkyNjQtMS4xNzEtNS40MTU4LTMuNzUxMS0xLjQ5MjItMS41NTYgMy4wMTU4IDIuNTMzOCAxLjk1MSAzLjc1MTEgMS40OTIyeiIKICAgICAgLz4KICAgICAgPHBhdGgKICAgICAgICAgIGlkPSJwYXRoNjM0MSIKICAgICAgICAgIHN0eWxlPSJmaWxsOnVybCgjcmFkaWFsR3JhZGllbnQ2MzQ5LTgpIgogICAgICAgICAgZD0ibS0xNDYuNzMgNzk2LjI0Yy0yLjExMjktNC40MzIxLTQuNTE4NS0xMC41OTktNy4yMDIyLTE1LjAxNi0zLjAxNTUtNi4yNzU2LTcuMzg1LTEyLjk4NS0xMi4wMDQtMTcuODM0LTYuMjQ1My03Ljg5MzMtMTUuMjgyLTEzLjc4Mi0yNC43MTItMTcuMDctOC41NTk2LTEuMjkyNy0xNS4zMTYgNS4xNTc5LTIwLjc1MiAxMC43MjgtMC40NDg3NS03LjQ3NjQgMS42MzE5LTE2LjUxNy0zLjM0MzktMjMuMDc1LTAuODA5MTQtNC4wOTY2LTYuMDA3OS01LjYwNzItOC4zOTcyLTcuNzMzNC01LjU2ODQtMi40NzIyLTExLjc3My0zLjI3NzYtMTcuODE4LTEuNDc2Ni01LjQ2NzYgMS40NjMyLTEwLjU0MiAzLjI1MS0xNS40NTUgNi40NTctNC4zMDU5IDIuNDAxOC03LjQ3NDQgNS40MzE4LTExLjU1MyA4LjU1OTMtNS4yNTc4IDEuODczMiAyLjg0NDUtMTYuMDgtMi41NjQ0LTIwLjU3Mi0xLjkyMDgtNS4zOTM4LTguNTI1Mi02LjUxMjQtMTMuMDI3LTguOTIzNy05LjAxODctMS43ODIxLTE3LjkyMyAwLjA5ODktMjYuNDIxIDIuNDY2Ny00LjcwMTcgMS4wMTAzLTguODk1NSA0LjQ4NTktMTIuOTA0IDYuODc0MS0zLjgxMzQgMi42MzU0LTcuMDMyIDQuMzk1LTEwLjYyNSA2Ljc5MDctMC44MzIxMy04LjE4MTcgMi41MTgtMTUuODIzIDMuODMyNS0yMy44MzggMS4yNzI3LTUuNjg5MSAzLjYyNjktMTEuMjE1IDQuNzg5LTE2Ljk3NiAyLjM2NTMtNC42NTk5IDMuODk4NC05LjY3OCA1LjkwNDgtMTQuMjk2IDMuMDQyMS02LjA5MzggNS45OTQyLTEyLjAxNiA5LjAwMjctMTguMDIgMi40MDE4LTMuNjE3NCA1LjQ3NDQtOC4zMDcgOC4xMDI0LTEyLjE2MyAyLjc4NzQtMy4yNzc3IDUuMTUzNi02Ljc5NjEgOC40MDI1LTkuOTEwNyAzLjkxNjctMy45Mjc1IDcuNjA3Ni03LjkyMDYgMTIuMTU0LTEwLjgxMiA0LjE3LTIuOTU0LTAuOTkzNzMgMTAuMjAyLTAuMzQyOTYgMTMuNTY1IDEuMTM1NiA1Ljc3MTggMS40MzggMTIuMzExIDQuNjk0MyAxNy4zNjkgMi40NDc1IDMuNTU2MyA0LjYxNTYgNi43NTYyIDcuNjUyMyA5LjkxMDcgNi40OTk1IDcuMzY4IDE0LjQyOSAxMy4xNjUgMjMuMjU3IDE3LjU5MyA0LjkwNzUgMi41NjUgMTAuMDg5IDQuMjc0MSAxNS4zMDUgNS45ODI2IDguMjIyMyAxLjg0NjYgMTYuNTYxIDQuMTYgMjUuMzU4IDQuMzU0NyA3LjY0NjYgMi4xNTMgMTUuMzIzIDEuNDYyOSAxMC43NDYtOC4yMDA5LTMuMTEwOC05LjgxMDUtMy42OTMxLTE4Ljc2NCAzLjgwODQtOS4wNjc4IDMuOTk2NiA1Ljk0NjggMTguMDc0IDMuMjIxMyAxOC44MDgtNC43NTYzIDAuOTA3OS02LjI5NDIgMC4yOTQ0Ni0xOC42MDIgNy42NzU4IDMuMzk0OS0wLjEwNjI4IDQuMDUyMiAyLjc4NjcgOC4zNDA5IDEwLjg3OSA1LjQ5ODggNC44Nzk0LTIuMDMwNSA2Ljk0NTItMi4zMTA0IDExLjU1MS01LjE4ODUgMy41NjYyLTIuNjg0NyA3LjEyMDQtNS43NzU1IDEwLjE5OS04LjQxMzIgNS42NTg2LTUuNjU3OSAxMS42MDMtMTIuMjEyIDE2LjIwOS0xOS4yMTcgMy42NDgzLTYuODg4NCA4LjA2MDEtMTQuMzk4IDguODEyLTIyLjYzNiAyLjQxNDEtOC41ODAxIDAuMDM3LTE3Ljk1Ni0zLjE5ODEtMjUuNzU5LTYuNzc1My05LjgwNDQgNy41OTA3LTMuNTQ1NCAxMi41NDItMy41NjA2IDYuNzk0OSAxLjIxNDggMTMuMzc1IDIuNzA3IDE5LjY1NiA1LjU4MjQgNS4wNDM2IDEuNjEyNSAxMC4yMjggMy44NjI4IDE0Ljg1NCA2LjQzMDYgNS4zNjY0IDIuMTM3OCAxMC42ODUgNi4wODg4IDE1LjkwNSA5LjAwOTggMy42MDMyIDIuNDMzNyA3LjE2NDMgNS4xMzc4IDEwLjk1MyA3Ljk1ODYgNC40OTU5IDMuMzc1NyA4LjcwNjQgNi43NDg2IDEyLjUyOSAxMC44NDkgMy40OTc5IDEuNzU3IDUuOTczMiA1LjQ1NzcgOC45MDM4IDguMjIxNCAzLjQ3NzQgNC4xMzQ5IDYuOTI2OSA4LjAyNjYgMTAuMTk5IDEyLjAxMy0zLjQ0NDIgMC44NjE3Mi0xMi43OC00LjA0MDItMTguMzM0LTUuMDIyOC04LjcwNDMtMC42Mzc4Ny0xNy43LTEuNzQ4OS0yNS41NTYgMi44MTQyLTYuNjI3MyAxLjkwMTQtMTIuMzY3IDguMDk5NS0xMy4wNTggMTUuMTIzLTIuNzU4NSA4LjMyMzkgMS40NTA2IDE2LjA4MiAzLjUwNjYgMjMuNjg3IDIuNzAxMiA0LjIzMDYgNC42Nzg0IDkuMDI2IDYuODA1NyAxMy4yNTMtMi44MzM4IDAuMjI0OS04LjY0MzMtNC41MzE1LTEyLjk3OS01LjEwMTQtNi41MDMzLTIuNzY3My0xNC4yNjUtNC45MTU1LTIxLjgzMi0zLjQ5MjgtNS40OTEyIDAuOTk3MTItOS45NzU3IDQuMDA5OS0xMy41MDQgOC41OTQyLTMuMjk3MSA2LjAxODItNi4yMzE4IDE0LjM1Ni0zLjY5MTcgMjEuNDYgMi41Mjg3IDguMjIzOCAxLjQ1MzEgOS40MjI4LTMuODEwNiAzLjAxNjktMy44MzQyLTQuMDcyMS04Ljc3NC02LjAyMi0xNC4xMDQtNi45MDc1LTUuMjQ3OC0wLjgzODg3LTExLjU0NiAxLjQ2OTktMTUuMDA0IDYuMDA2NS03Ljg4MzQgNi42ODQ5LTEwLjQyIDE3LjE5My0xMi40MSAyNi41NzktMy4xNjM2IDE0LjktMC40MzM0MyAzMC4yODUgMi4yMDczIDQ0Ljg5OWwtMC4zMDAwOCAxLjA1MTF6bS0zMS44NTYtMTAxLjU1Yy0xLjA0OTYtNy42MDU1LTExLjc2NSAwLjExMjMyLTIuMDY0NSAxLjM5MzQgMS4wMjI5IDAuNDMzMDIgMS43ODMzLTAuOTc2MTUgMi4wNjQ1LTEuMzkzNHptNy41NDg5LTAuODY4NDhjNS4zNzAyLTYuOTI2NC0xLjE3MS01LjQxNTgtMy43NTExLTEuNDkyMi0xLjU1NiAzLjAxNTggMi41MzM4IDEuOTUxIDMuNzUxMSAxLjQ5MjJ6IgogICAgICAvPgogICAgICA8cGF0aAogICAgICAgICAgaWQ9InBhdGg2MjY0IgogICAgICAgICAgc3R5bGU9Im9wYWNpdHk6LjQxMTUwO2ZpbGw6IzJhNTVmZiIKICAgICAgICAgIGQ9Im0tMTA3LjQ3IDU5Ny42NGM3LjcyNzEgMjIuNjI0LTIuMzk0NiA0Ny4zNTUtMTguMTg2IDYzLjk3OC0xMS43MzkgMTQuMDg4LTQwLjY4MyAyNi4wNjEtNDAuNTc3IDE1LjY4Ni0yLjgzMTEgMC4yNDYxNC0wLjE2Mjg0LTE2LjIzMy00LjE1MDMtMTEuMzg0LTIuNTM2MSAxMy4zOS0xNC45NDUgMTUuOTU2LTI0LjMgNy42NzEzIDIuNjUwOCAzLjYzMDEgOC44NzA0IDEwLjM4NiAwLjk4NTI1IDE5LjYyMy0yMi44OSAzLjU3ODQtNDUuOTM5LTIuNjc4Mi02NS45MTctMTMuOTEtMTYuNDY0LTEwLjUxOC0yOC43ODItMjguNjEtMjkuNjk5LTQ4LjcyNy0yMi43MTMgMjQuOTA4LTM2Ljg0MiA1Ni44NzItNDIuMjgxIDkwLjAzMSAxNi4zODQtMTIuMDUgNDAuODk0LTE4LjYyNCA1OC40MDYtNS4zMTI1IDUuNTM5NiA0LjM0NzQgNS44Mjk0IDEyLjAxMyA3LjUgMTguMzEyIDEyLjk1NC0xMi42MzUgMzcuMzMtMTYuMjM2IDUwLjMxMi0xLjc1IDMuMDk5NCA1LjE5MDIgNC41NTQxIDE0LjM5IDEyLjMxMiAxNCAxNi4zMzktNC4yMTgyIDMxLjEyMiA4LjQ4NTYgNDAuMzQ0IDIwLjY1NiA0Ljg0NjIgMi43MDU0IDguMzctMy44MDEyIDcuNDM3NS04LjA2MjUgMC40MjQ4NC0xNS4wMDkgNy4xOTAzLTMxLjU5MSAyMS0zOS4wMzEgNy4yNDU2LTQuODY5IDE2LjAzNiAwLjMxMDIxIDIzLjkzOC0yLjIxODgtMS4xNTc2LTIxLjEwNCAyNy4zOTQtMzUuMzA5IDQzLjYyNS0yMS42ODggNC41MDU5IDEuNTA5MiA0LjY2MjEtNS4yNzQ1IDEuODEyNS03LjEyNS05LjY2NDgtMTUuNjQyLTAuNTM1MzYtNDAuNTU3IDE4LjY4OC00MyA4LjU0NjQtMi4xMzU3IDE3LjMzNC0xLjQ3NTkgMjYuMDYyLTEuNzE4OC0yMy41ODgtMjQuMDk0LTU0LjAyMi00Mi45NDItODcuNzE5LTQ3Ljg3NWwwLjIxNTE4IDAuOTc2NTd6IgogICAgICAvPgogICAgICA8cGF0aAogICAgICAgICAgaWQ9InBhdGg2NDA5IgogICAgICAgICAgc3R5bGU9ImZpbGw6dXJsKCNsaW5lYXJHcmFkaWVudDY2MjgpIgogICAgICAgICAgY2xpcC1wYXRoPSJ1cmwoI2NsaXBQYXRoNjE1MS02NCkiCiAgICAgICAgICBkPSJtNDgwLjE2IDYxMS40N2M5LjI2NTcgMTcuNjMzIDMuOTcxOSAzOS41MDQtNy41MzEyIDU0LjgxMi05LjkzMjIgMTQuMDY4LTIzLjI2MyAyNy42MzQtNDAuNDM4IDMxLjg0NC01LjcwMzggMS40NDE1LTExLjAwMi0zLjEwNzYtMTEuNTMxLTguNzUtMC41NjMwNS0xLjU2Mi0xLjM1MTMtNy41NjAyLTEuNzgxMi0zLjI4MTItMS45MTIyIDEwLjkwMS0xNy40NTQgMTMuOTIxLTI0LjM3NSA1Ljg3NS0xLjk1MTItMi44MjUyIDIuMjM5MSA3LjYxNzkgMC45OTAzNSA0LjU2MjQgMi40Njg2IDQuNzgzNSAzLjIzNDIgMTMuMjA4LTMuNDU5MSAxNC42NTYtNi43Njk3IDEuMTk0MS0xMy40ODUtMS42Mzk0LTIwLjI4MS0xLjcxODgtMjUuNjAxLTMuODIzMi01MS43MjItMTcuMTc1LTY0LjE1Ni00MC41OTQtMy40Mzc0LTcuNjk3Ni00LjczMjgtMTcuMjU5LTIuNzgxMi0yNC45NjktMjYuNTA2IDIzLjAwNS0zOS45NTcgNTcuOTA4LTQ2Ljg0NCA5MS44NzUtMi43MjI3IDcuODcxNCAzLjkxMDYgMC43NzEyIDcuMjgxMi0wLjg0Mzc1IDEyLjcxMy04LjI2OCAyOS40MjktMTIuMjE1IDQ0LjA5NC03LjA2MjUgOC44NzQgMi45NjQxIDE1LjI3OCAxMi41MTMgMTIuNDA2IDIxLjgxMi0xLjcwNzIgNS4yNDM1IDAuMjIzODQgNC40NDgxIDMuNTkzOCAxLjE4NzUgMTEuOTU4LTguOTgzNCAyOS4xODItMTUuMjcgNDMuMTg4LTcuMTI1IDguNjQ1NiA1LjI1NTkgMTIuMTE4IDE2LjA0OSAxMC44NDQgMjUuNzUgNi4zNjUtNy4wMjgzIDE3Ljg3OC05Ljg0NDIgMjYtNC4xMjUgMTMuOTI4IDYuODIzNCAyNC4wMDYgMTkuNDY2IDMxLjE1NiAzMy0yLjI1MjctMTkuNzMtMC4zNzMyOS00Mi41OTcgMTQtNTcuNDY5IDcuMjU4Ny03LjYyOTUgMTkuNjI0LTguMTY4NyAyNy45NjktMi4xNTYyIDIuNDA4NCAxLjcxOTIgNC41NjA0IDQuMDMxMyAzLjEyNS0wLjQzNzUtMS45Mjg2LTE0LjM4OSA4LjYyNDMtMjkuODA3IDIzLjcwNi0zMC4xNjYgOS4xNzY2LTAuNTk1MTggMTguMDggMy4xOTc4IDI2LjEzOCA2LjYwMzctNi40MDczLTEyLjEwNy0xMi4zMTEtMjcuODU0LTQuMjUtNDAuNTMxIDcuMjM5OS0xMC40MTMgMjEuNTU1LTEzLjU4OCAzMy42NTYtMTIuMzc1IDUuMzQzOCAwLjU5NDI4IDEwLjU2MyAxLjkxMTMgMTUuNTk0IDMuNzE4OC0yNC42MS0yOC4yOC01OC42My01MC40LTk2LjU1LTU0LjU1bDAuMjUgMC40Njg3NXptLTYyLjE5IDkzLjUzYzUuNDY3MiAwLjQzNDM5IDQuMTQ4OSA4LjA1NzYgMC4yNSA5Ljg0MzgtMS45Nzk5IDEuNTY0Ni01LjU2MDYgMS4wNDMyLTYuODEyNSAwLjA5MzctMi42MDM1IDYuMzQ1LTEzLjcwMSAwLjQ5MjUtOS44MTI1LTUuMjgxMiAyLjA3OTctMy4yNDQzIDcuNjM2LTIuNjIyNyA5LjQzNzUtMC41MzEyNSAxLjgyOTMtMS45MDA4IDQuMTMyOC0zLjg4NzEgNi45Mzc1LTQuMTI1eiIKICAgICAgICAgIHRyYW5zZm9ybT0idHJhbnNsYXRlKC01ODkuOTggLTE1LjczNykiCiAgICAgIC8+CiAgICAgIDxwYXRoCiAgICAgICAgICBpZD0icGF0aDY0MzAiCiAgICAgICAgICBzdHlsZT0iZmlsbDp1cmwoI2xpbmVhckdyYWRpZW50NjYyOCkiCiAgICAgICAgICBjbGlwLXBhdGg9InVybCgjY2xpcFBhdGg2MTUxLTY0KSIKICAgICAgICAgIGQ9Im00ODAuMTYgNjExLjQ3YzkuMjY1NyAxNy42MzMgMy45NzE5IDM5LjUwNC03LjUzMTIgNTQuODEyLTkuOTMyMiAxNC4wNjgtMjMuMjYzIDI3LjYzNC00MC40MzggMzEuODQ0LTUuNzAzOCAxLjQ0MTUtMTEuMDAyLTMuMTA3Ni0xMS41MzEtOC43NS0wLjU2MzA1LTEuNTYyLTEuMzUxMy03LjU2MDItMS43ODEyLTMuMjgxMi0xLjkxMjIgMTAuOTAxLTE3LjQ1NCAxMy45MjEtMjQuMzc1IDUuODc1LTEuOTUxMi0yLjgyNTIgMi4yMzkxIDcuNjE3OSAwLjk5MDM1IDQuNTYyNCAyLjQ2ODYgNC43ODM1IDMuMjM0MiAxMy4yMDgtMy40NTkxIDE0LjY1Ni02Ljc2OTcgMS4xOTQxLTEzLjQ4NS0xLjYzOTQtMjAuMjgxLTEuNzE4OC0yNS42MDEtMy44MjMyLTUxLjcyMi0xNy4xNzUtNjQuMTU2LTQwLjU5NC0zLjQzNzQtNy42OTc2LTQuNzMyOC0xNy4yNTktMi43ODEyLTI0Ljk2OS0yNi41MDYgMjMuMDA1LTM5Ljk1NyA1Ny45MDgtNDYuODQ0IDkxLjg3NS0yLjcyMjcgNy44NzE0IDMuOTEwNiAwLjc3MTIgNy4yODEyLTAuODQzNzUgMTIuNzEzLTguMjY4IDI5LjQyOS0xMi4yMTUgNDQuMDk0LTcuMDYyNSA4Ljg3NCAyLjk2NDEgMTUuMjc4IDEyLjUxMyAxMi40MDYgMjEuODEyLTEuNzA3MiA1LjI0MzUgMC4yMjM4NCA0LjQ0ODEgMy41OTM4IDEuMTg3NSAxMS45NTgtOC45ODM0IDI5LjE4Mi0xNS4yNyA0My4xODgtNy4xMjUgOC42NDU2IDUuMjU1OSAxMi4xMTggMTYuMDQ5IDEwLjg0NCAyNS43NSA2LjM2NS03LjAyODMgMTcuODc4LTkuODQ0MiAyNi00LjEyNSAxMy45MjggNi44MjM0IDI0LjAwNiAxOS40NjYgMzEuMTU2IDMzLTIuMjUyNy0xOS43My0wLjM3MzI5LTQyLjU5NyAxNC01Ny40NjkgNy4yNTg3LTcuNjI5NSAxOS42MjQtOC4xNjg3IDI3Ljk2OS0yLjE1NjIgMi40MDg0IDEuNzE5MiA0LjU2MDQgNC4wMzEzIDMuMTI1LTAuNDM3NS0xLjkyODYtMTQuMzg5IDguNjI0My0yOS44MDcgMjMuNzA2LTMwLjE2NiA5LjE3NjYtMC41OTUxOCAxOC4wOCAzLjE5NzggMjYuMTM4IDYuNjAzNy02LjQwNzMtMTIuMTA3LTEyLjMxMS0yNy44NTQtNC4yNS00MC41MzEgNy4yMzk5LTEwLjQxMyAyMS41NTUtMTMuNTg4IDMzLjY1Ni0xMi4zNzUgNS4zNDM4IDAuNTk0MjggMTAuNTYzIDEuOTExMyAxNS41OTQgMy43MTg4LTI0LjYxLTI4LjI4LTU4LjYzLTUwLjQtOTYuNTUtNTQuNTVsMC4yNSAwLjQ2ODc1em0tNjIuMTkgOTMuNTNjNS40NjcyIDAuNDM0MzkgNC4xNDg5IDguMDU3NiAwLjI1IDkuODQzOC0xLjk3OTkgMS41NjQ2LTUuNTYwNiAxLjA0MzItNi44MTI1IDAuMDkzNy0yLjYwMzUgNi4zNDUtMTMuNzAxIDAuNDkyNS05LjgxMjUtNS4yODEyIDIuMDc5Ny0zLjI0NDMgNy42MzYtMi42MjI3IDkuNDM3NS0wLjUzMTI1IDEuODI5My0xLjkwMDggNC4xMzI4LTMuODg3MSA2LjkzNzUtNC4xMjV6IgogICAgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTU4OS45OCAtMTUuNzM3KSIKICAgICAgLz4KICAgIDwvZwogICAgPgogIDwvZwogID4KICA8bWV0YWRhdGEKICAgID4KICAgIDxyZGY6UkRGCiAgICAgID4KICAgICAgPGNjOldvcmsKICAgICAgICA+CiAgICAgICAgPGRjOmZvcm1hdAogICAgICAgICAgPmltYWdlL3N2Zyt4bWw8L2RjOmZvcm1hdAogICAgICAgID4KICAgICAgICA8ZGM6dHlwZQogICAgICAgICAgICByZGY6cmVzb3VyY2U9Imh0dHA6Ly9wdXJsLm9yZy9kYy9kY21pdHlwZS9TdGlsbEltYWdlIgogICAgICAgIC8+CiAgICAgICAgPGNjOmxpY2Vuc2UKICAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9saWNlbnNlcy9wdWJsaWNkb21haW4vIgogICAgICAgIC8+CiAgICAgICAgPGRjOnB1Ymxpc2hlcgogICAgICAgICAgPgogICAgICAgICAgPGNjOkFnZW50CiAgICAgICAgICAgICAgcmRmOmFib3V0PSJodHRwOi8vb3BlbmNsaXBhcnQub3JnLyIKICAgICAgICAgICAgPgogICAgICAgICAgICA8ZGM6dGl0bGUKICAgICAgICAgICAgICA+T3BlbmNsaXBhcnQ8L2RjOnRpdGxlCiAgICAgICAgICAgID4KICAgICAgICAgIDwvY2M6QWdlbnQKICAgICAgICAgID4KICAgICAgICA8L2RjOnB1Ymxpc2hlcgogICAgICAgID4KICAgICAgICA8ZGM6dGl0bGUKICAgICAgICAgID5IYWxsb3dlZW4gSCAxMDwvZGM6dGl0bGUKICAgICAgICA+CiAgICAgICAgPGRjOmRhdGUKICAgICAgICAgID4yMDEwLTA5LTIxVDIwOjE2OjQ2PC9kYzpkYXRlCiAgICAgICAgPgogICAgICAgIDxkYzpkZXNjcmlwdGlvbgogICAgICAgICAgPkdsb3NzeSBCYXRzPC9kYzpkZXNjcmlwdGlvbgogICAgICAgID4KICAgICAgICA8ZGM6c291cmNlCiAgICAgICAgICA+aHR0cHM6Ly9vcGVuY2xpcGFydC5vcmcvZGV0YWlsLzg2MjA5L2hhbGxvd2Vlbi1oLTEwLWJ5LWlua3kyMDEwPC9kYzpzb3VyY2UKICAgICAgICA+CiAgICAgICAgPGRjOmNyZWF0b3IKICAgICAgICAgID4KICAgICAgICAgIDxjYzpBZ2VudAogICAgICAgICAgICA+CiAgICAgICAgICAgIDxkYzp0aXRsZQogICAgICAgICAgICAgID5pbmt5MjAxMDwvZGM6dGl0bGUKICAgICAgICAgICAgPgogICAgICAgICAgPC9jYzpBZ2VudAogICAgICAgICAgPgogICAgICAgIDwvZGM6Y3JlYXRvcgogICAgICAgID4KICAgICAgICA8ZGM6c3ViamVjdAogICAgICAgICAgPgogICAgICAgICAgPHJkZjpCYWcKICAgICAgICAgICAgPgogICAgICAgICAgICA8cmRmOmxpCiAgICAgICAgICAgICAgPjIwMTA8L3JkZjpsaQogICAgICAgICAgICA+CiAgICAgICAgICAgIDxyZGY6bGkKICAgICAgICAgICAgICA+SGFsbG93ZWVuPC9yZGY6bGkKICAgICAgICAgICAgPgogICAgICAgICAgICA8cmRmOmxpCiAgICAgICAgICAgICAgPklua3NjYXBlPC9yZGY6bGkKICAgICAgICAgICAgPgogICAgICAgICAgICA8cmRmOmxpCiAgICAgICAgICAgICAgPmF2YXRhcjwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID5iYXQ8L3JkZjpsaQogICAgICAgICAgICA+CiAgICAgICAgICAgIDxyZGY6bGkKICAgICAgICAgICAgICA+YmF0czwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID5ibGFjazwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID5jbGlwPC9yZGY6bGkKICAgICAgICAgICAgPgogICAgICAgICAgICA8cmRmOmxpCiAgICAgICAgICAgICAgPmZyZWU8L3JkZjpsaQogICAgICAgICAgICA+CiAgICAgICAgICAgIDxyZGY6bGkKICAgICAgICAgICAgICA+Z2hvc3Q8L3JkZjpsaQogICAgICAgICAgICA+CiAgICAgICAgICAgIDxyZGY6bGkKICAgICAgICAgICAgICA+Z2xvc3M8L3JkZjpsaQogICAgICAgICAgICA+CiAgICAgICAgICAgIDxyZGY6bGkKICAgICAgICAgICAgICA+Z2xvc3N5PC9yZGY6bGkKICAgICAgICAgICAgPgogICAgICAgICAgICA8cmRmOmxpCiAgICAgICAgICAgICAgPmhhbGxvd2VlbjIwMTA8L3JkZjpsaQogICAgICAgICAgICA+CiAgICAgICAgICAgIDxyZGY6bGkKICAgICAgICAgICAgICA+aWNvbjwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID5pbmt5MjAxMDwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID5zaGFkZTwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID5zaWxob3VldHRlPC9yZGY6bGkKICAgICAgICAgICAgPgogICAgICAgICAgICA8cmRmOmxpCiAgICAgICAgICAgICAgPnNwb29reTwvcmRmOmxpCiAgICAgICAgICAgID4KICAgICAgICAgICAgPHJkZjpsaQogICAgICAgICAgICAgID50ZXh0PC9yZGY6bGkKICAgICAgICAgICAgPgogICAgICAgICAgPC9yZGY6QmFnCiAgICAgICAgICA+CiAgICAgICAgPC9kYzpzdWJqZWN0CiAgICAgICAgPgogICAgICA8L2NjOldvcmsKICAgICAgPgogICAgICA8Y2M6TGljZW5zZQogICAgICAgICAgcmRmOmFib3V0PSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9saWNlbnNlcy9wdWJsaWNkb21haW4vIgogICAgICAgID4KICAgICAgICA8Y2M6cGVybWl0cwogICAgICAgICAgICByZGY6cmVzb3VyY2U9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zI1JlcHJvZHVjdGlvbiIKICAgICAgICAvPgogICAgICAgIDxjYzpwZXJtaXRzCiAgICAgICAgICAgIHJkZjpyZXNvdXJjZT0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjRGlzdHJpYnV0aW9uIgogICAgICAgIC8+CiAgICAgICAgPGNjOnBlcm1pdHMKICAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyNEZXJpdmF0aXZlV29ya3MiCiAgICAgICAgLz4KICAgICAgPC9jYzpMaWNlbnNlCiAgICAgID4KICAgIDwvcmRmOlJERgogICAgPgogIDwvbWV0YWRhdGEKICA+Cjwvc3ZnCj4K");
            display: inline-block
        }

        .bar,.bat,.shadow,#content,.copyright img {
            filter: drop-shadow(0 0 7px #000)
        }

        #list,.overlay {
            height: calc(100% - 45px)
        }

        #list {
            margin: 12px 0
        }

        #media {
            height:100%;
        }

        #media img,#media video {
            top: 45px;
            border: 1px solid #000;
            box-shadow: 0 0 7px 7px #000;
            outline: #124 solid 4px;
            position: 50% 50%;
            width: 166px!important;
            z-index: 1;
            margin: 7px
        }

        #media img,#media video,#menu {
            height: auto
        }

        #media img:hover,#media video:hover {
            outline: #444 solid 4px
        }

        #menu img {
            width: 150px!important;
            padding: 28px 14px
        }

        #UserIcon {
            height: 100px;
            border-radius: 50px;
            outline: 3px solid #124
        }

        #MIT {
        	height: 0;
            font-size: 16px;
            transform: rotate3d(1, 0, 0, 90deg);
            transition-property: height, transform;
            transition-duration: 1s;
            transition-timing-function: ease;
        }
  
        #MIT.visible {
            height: 100%;
            transform: rotate3d(1, 0, 0, 0deg);
        }

        .overlay {
            will-change: scroll-position;
            box-shadow: inset 0 0 7px 7px #000
        }

        .copyright, .text {
            line-height: 2;
            text-shadow: 0 0 14px #000;
            color: #48f;
            cursor: default;
            font-size: 16px;
            text-decoration: none
        }

        .copyright img {
            height: 32px
        }

        * {
            user-select: none;
            -webkit-tap-highlight-color: transparent
        }

        a {
            color: #48f;
            cursor: default;
            font-size: 20px;
            text-decoration: none
        }

        body {
            background: radial-gradient(#124,#000) center no-repeat,#000;
            overscroll-behavior:none;
            height:100%;
            margin: 0
        }

        .bat,.overlay,body {
            overflow: auto
        }

        #media img,#media video,body {
            background-size: 100%
        }

        html {
            backface-visibility: hidden;
            transform: translate3D(0,0,0);
            height:100%;
        }

        video::-webkit-media-controls-panel {
            background-image: linear-gradient(transparent,transparent)!important
        }

        #content {
            height: 100%;
            backdrop-filter: blur(7px)brightness(50%);
        }

        #lightbox {
            display: none;
            width: 100%;
            height: calc(100% - 45px);
            top: 0;
            left: 0;
            position: fixed;
            text-align: center;
            z-index: 99999
        }

        #lightbox img,#lightbox video {
            width: auto!important;
            height: auto!important;
            max-width: 100%!important;
            max-height: 100%!important;
            outline: 0!important;
            border: 0!important;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto
        }
    </style>

</head>
<body>
    <div class="overlay">
        <div id="list">
            <span id="media">
<?php

                // Define where we want to look for files.
                $searchPath = 'Camera/';

                // Get a list of everything in our search path
                $files = scandir($searchPath);

                // For each item in that list
                foreach ($files as $file) {

                    // Check if it is an image file
                    if (strpos($file, '.jpg') !== false) {

                        // Add the img tag
                        echo '                <img loading="lazy" data-media="image" type="image/jpg" src="'.$searchPath.$file.'">
';

                    }

                    // Check if it is an mp4 file
                    if (strpos($file, '.mp4') !== false) {

                        // Add the video tag
                        echo '                <video data-media="video" type="video/mp4" src="'.$searchPath.$file.'"></video>
';

                    }

                }
                ?>
                	</span>
                	<br>
                	<span class="text">
                	<?php echo "Last synced: " . date ("F d Y H:i:s", getlastmod()); ?>  UTC.
                    </span>
                	<br>
                	<span class="copyright">
                	<?php echo "Kave &copy 2018-".date ("Y", getlastmod()); ?> Alex "Styromaniac" Goven
                    <br>
                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLXphei0tPgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaGVpZ2h0PSIxNjYiIHdpZHRoPSIzMjEiPgo8ZyBzdHJva2Utd2lkdGg9IjM1IiBzdHJva2U9IiNBMzFGMzQiPgo8cGF0aCBkPSJtMTcuNSwwdjE2Nm01Ny0xNjZ2MTEzbTU3LTExM3YxNjZtNTctMTY2djMzbTU4LDIwdjExMyIvPgo8cGF0aCBkPSJtMTg4LjUsNTN2MTEzIiBzdHJva2U9IiM4QThCOEMiLz4KPHBhdGggZD0ibTIyOSwxNi41aDkyIiBzdHJva2Utd2lkdGg9IjMzIi8+CjwvZz4KPC9zdmc+Cg==">
                    <br>
<div id="MIT" class="transition hide">
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
<br>
<br>
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
<br>
<br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
</div>
                	</span>
                <div id="lightbox">
                    <div class="bar">
                        <a oncontextmenu="toggleFullScreen()" onclick="window.closeLightbox()">
                            <span class="bat"></span>
                        </a>
                    </div>
                    <div id="content">
                    </div>
                </div>
            </span>
        </div>
    </div>
    <div class="bar">
        <a onClick="window.location.href=window.location.href" oncontextmenu="toggleFullScreen()">
            <span class="bat">
        </a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/webtorrent@0.107.17/webtorrent.min.js"></script>

<script>
  const client = new WebTorrent()
  
  // Get all images with data-magnet attribute
  const images = document.querySelectorAll('img[data-magnet]')
  images.forEach(image => {
    const magnetURI = image.getAttribute('data-magnet')

    client.add(magnetURI, (torrent) => {
      const file = torrent.files.find(file => file.name.endsWith('.jpg') || file.name.endsWith('.png'))
      image.src = URL.createObjectURL(file.createReadStream())

      torrent.on('done', () => {
        client.seed(torrent)
        image.style.outline = '#313 solid 4px'
      })
    })
  })
  
  // Get all videos with data-magnet attribute
  const videos = document.querySelectorAll('video[data-magnet]')
  videos.forEach(video => {
    const magnetURI = video.getAttribute('data-magnet')

    client.add(magnetURI, (torrent) => {
      const file = torrent.files.find(file => file.name.endsWith('.mp4') || file.name.endsWith('.webm'))
      video.src = URL.createObjectURL(file.createReadStream())

      torrent.on('done', () => {
        client.seed(torrent)
        video.style.outline = '#313 solid 4px'
      })
    })
  })
</script>

    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Viewplayer.js"></script>
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Lightbox.js"></script>
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Fullscreen.js"></script>
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Copyright.js"></script>


</body>
</html>
