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
    <base href="./" target="_top">

<script>
  if (location.protocol === "https:" && window.top === window) {
    var KaveTorrentScript = document.createElement("script");
    KaveTorrentScript.src = "KaveTorrent.js";
    document.head.appendChild(KaveTorrentScript);
  }
</script>

    <style>
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

        #bar,#bat {
            height: 45px
        }

        #bat {
            bottom: 0
        }

        #bar,#list {
            text-align: center
        }

        #bar,html {
            overflow: hidden
        }

        #bar {
            background: linear-gradient(to bottom,#36c,#060c18,#0c1830);
            border-radius: 23px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 2
        }

        #bat {
            content: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNTYzLjY3OSIgaGVpZ2h0PSIzNjYuMTE3Ij48ZGVmcz48bGluZWFyR3JhZGllbnQgeDE9Ii0xNjcuNTciIHkxPSI3MjEuNzI1IiB4Mj0iLTE4NS4zMTciIHkyPSI2MDYuMzY5IiBpZD0iZiIgeGxpbms6aHJlZj0iI2EiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKC0xLjI2OCA1LjA3KSIvPjxsaW5lYXJHcmFkaWVudCBpZD0iYSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMmIwMDAwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMmIwMDAwIiBzdG9wLW9wYWNpdHk9IjAiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYyI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZDQ1NTAwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZDQ1NTAwIiBzdG9wLW9wYWNpdHk9IjAiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4MT0iNDAwLjgzNCIgeTE9IjYwNy45NTkiIHgyPSI0MjQuMTY2IiB5Mj0iNzEwLjgxMiIgaWQ9ImkiIHhsaW5rOmhyZWY9IiNiIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIvPjxsaW5lYXJHcmFkaWVudCBpZD0iYiI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9IjAiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4MT0iNDAwLjgzNCIgeTE9IjYwNy45NTkiIHgyPSI0MjQuMTY2IiB5Mj0iNzEwLjgxMiIgaWQ9ImoiIHhsaW5rOmhyZWY9IiNiIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIvPjxmaWx0ZXIgY29sb3ItaW50ZXJwb2xhdGlvbi1maWx0ZXJzPSJzUkdCIiBpZD0iZSI+PGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iMi43MTQiLz48L2ZpbHRlcj48ZmlsdGVyIGlkPSJkIiBjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnM9InNSR0IiPjxmZUNvbG9yTWF0cml4IHR5cGU9Imh1ZVJvdGF0ZSIgdmFsdWVzPSIxODAiIHJlc3VsdD0iY29sb3IxIi8+PGZlQ29sb3JNYXRyaXggdmFsdWVzPSIxIDAgMCAwIDAgMCAxIDAgMCAwIDAgMCAxIDAgMCAtMC4yMSAtMC43MiAtMC4wNyAyIDAiIHJlc3VsdD0iY29sb3IyIi8+PC9maWx0ZXI+PHJhZGlhbEdyYWRpZW50IGN4PSItMTgwLjk5MiIgY3k9IjYzNy4yMzEiIHI9IjE2NC42MzciIGZ4PSItMTgwLjk5MiIgZnk9IjYzNy4yMzEiIGlkPSJnIiB4bGluazpocmVmPSIjYyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoLjYzMTM3IC0uMDIzMSAuMDIzMSAuNjMxMiAtNzkuNDIyIDI1My4yMDcpIi8+PGNsaXBQYXRoIGlkPSJoIj48cGF0aCBkPSJNNTM5LjExNyA2NDEuMzgyYTE2NC45MyA3Ni42MzkgMCAxMS0zMjkuODYgMCAxNjQuOTMgNzYuNjM5IDAgMTEzMjkuODYgMHoiIGZpbGw9IiNmZmYiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIyIi8+PC9jbGlwUGF0aD48L2RlZnM+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTg4Ljc2MyAtNjEuOSkiIGZpbHRlcj0idXJsKCNkKSI+PHBhdGggZD0iTS0xMTIuOCA1OTQuNDQ5Yy0zLjkxNy0uMDI2LTIuOTM3IDQuODg5LS45MzggNi43NSA2LjUwMyAxMy4zMTQgNC41NzggMjkuMTQ3LTIuNTAyIDQxLjc5OC03LjEyMyAxMy45MDktMTguNDk4IDI1LjcxNC0zMS40NjcgMzQuNDUyLTUuMTc4IDEuNzQ5LTExLjU3NCA2Ljc1NS0xNy4wMzEgMy41LTIuNjA5LTMuMDk3LTEuOTktNy45MDktNC4xODgtMTEuNDctMS4xMS0xLjg4Ni0yLjI3My03Ljg2Mi01LjM3NS01LjgxMi0yLjM3NCA1LjAyLjM5MyAxMi44MzktNi4zNDMgMTUuMjgyLTUuMDcgMi42MDYtMTEuNzQxIDEuMzM1LTE0LjQzOC0zLjkwNy0xLjQzMy0yLjkwOC02LjI0Ni0yLjg5OC01LjYyNSAxLjAzMi0uNDA3IDUuODk1IDMuMzQzIDExLjI0NiAzLjQwNiAxNi44NDMtMi40MDYgNC41MzgtOC43NTIgMS4yOTctMTIuNzE4IDEuMzEzLTI1Ljg4Ny0xLjk2Mi01Mi41MS0xMi43MzgtNjcuNDM4LTM0LjgxMy00LjgxMi02LjEyLTUuOTc5LTE0LjU2LTYuMTg3LTIyLjA5My4wMDctMy44MyAzLjQ5OS04LjY5MS45NjgtMTIuMDk0LTMuNzM0LS4wOTMtNi4zOTMgNC4xNDgtOS4yNCA2LjE1MS0xNy4wMTYgMTUuNTgtMjcuNzYyIDM2Ljc0Ny0zNS45NDcgNTguMTMtNC4xOTIgMTIuNDE4LTcuNjgzIDI1LjI3OC05LjYyNSAzOC4zNDQtLjgxMSA1LjA2NC42NjggNy4yMDEgNC44NTMgMy4xNDkgOC42NDctNS4yMzQgMTYuNjE4LTEyLjEzOSAyNy4xOC0xMy4xODIgOS40ODQtMi4zNTQgMTkuODg1LTEuOTY0IDI4LjA2IDMuODc3IDQuMzk0IDMuMzIgNS44NTQgOC45OTcgNC41OTQgMTQuMjUuMTYxIDMuMjk0LTIuOSA4Ljg0Mi44MTMgMTAuODQzIDQuNzMxLTEuMTc0IDcuNzU4LTYuMzk4IDEyLjI1LTguMzEyIDEwLjAwOC02LjE4IDIzLjgwMy0xMS40MDUgMzQuNjg3LTQuMzQ0IDYuMzk1IDIuNjkxIDkuMjc0IDkuNjk2IDkuNzUgMTYuMzQ0LjIzMiA0Ljg3NC0uMzE3IDkuNzU0LjA5NCAxNC42MjUgNS45MTUtNS45NTIgMTMuNzI2LTE0LjQ3NiAyMy0xMS4yODEgMjEuOTAxIDguMDE3IDM0LjExOCAyOS44NyA0Mi4xOTMgNTAuNTc4IDEuOTQgNC4xMTYgMS45NzItNi41My42MjUtOC43MTItMy43ODYtMTkuMjYyLTMuOTItNDAuNTQ3IDUuNzQ1LTU4LjA1NCA0LjYwMy02Ljc0NiAxMS41ODUtMTMuODk5IDIwLjU2Mi0xMS44MTIgNi43NjUuNzc5IDExLjk1NiA1LjQwOSAxNi4yMTkgMTAuMjE4IDIuNTA1IDIuMTAzIDMuODk2LTEuNzA5IDIuNzgxLTMuNzE4LTMuNzcxLTkuMTctMS43NDQtMjAuNDk4IDUuMjE5LTI3LjU5NCA4LjgyLTguNjYgMjIuNDEtNS44MjUgMzIuNTMxLTEuNTk0IDQuNzg3IDEuMDEyIDguNjI5IDUuNDcgMTMuNzgxIDQuOTY5LTUuMDkyLTEwLjgzLTEyLjEyOS0yMS41Ny0xMS42NTYtMzMuOTM4LjQ0LTguMDEgNS4yMDUtMTYuMDk5IDEzLjQwNi0xOC4yNSA4Ljc5NC00LjY5IDE5LjgxMi0zLjg2IDI5LjE2My0xLjU2IDUuMTk4IDEuMzY1IDEwLjM4NCA1LjAxIDE1LjkzMSAzLjYyMy03LjEtOC43OTMtMTQuNDI1LTE3LjUyMS0yMy4wOTQtMjQuNDY5LTIwLjMzOS0xNy44OS00NC42MDctMzIuMTc3LTcxLjQzNy0zNy4xMjUtNC4wNjMtLjE0Mi04LjMyMi0yLjExNS0xMi41NjMtMS45Mzd6bS02MC4yNSAxMDEuNDY4Yy41NzcgMS42ODYtMy4wMjQgNC43NC00LjA5NCAzLjE4OC43NjUtMS41MzggMi40NjYtMi44MzcgNC4wOTMtMy4xODh6bS0xMS40MzggMi4zNzVjMi40OS0uMDMgMi4zOTIgNC41ODMtLjU2MyAyLjYyNS0yLjc2NC0uNTE1LTEuNzMyLTIuNTg3LjU2My0yLjYyNXoiIHRyYW5zZm9ybT0ibWF0cml4KDEuNjA4NzEgMCAwIDEuNTg4OCA2NTAuNTcyIC04NjkuODUxKSIgZmlsdGVyPSJ1cmwoI2UpIi8+PHBhdGggZD0iTS0xNDkuMjYgNzk4Ljc3NmMtMi4xMTQtNC40MzItNC41Mi0xMC41OTktNy4yMDMtMTUuMDE2LTMuMDE1LTYuMjc2LTcuMzg1LTEyLjk4NS0xMi4wMDQtMTcuODM0LTYuMjQ1LTcuODk0LTE1LjI4Mi0xMy43ODMtMjQuNzEyLTE3LjA3LTguNTYtMS4yOTMtMTUuMzE2IDUuMTU4LTIwLjc1MSAxMC43MjgtLjQ0OS03LjQ3NyAxLjYzMi0xNi41MTctMy4zNDQtMjMuMDc1LS44MS00LjA5Ny02LjAwOC01LjYwNy04LjM5Ny03LjczNC01LjU2OS0yLjQ3Mi0xMS43NzQtMy4yNzctMTcuODE4LTEuNDc2LTUuNDY4IDEuNDYzLTEwLjU0MiAzLjI1LTE1LjQ1NSA2LjQ1Ny00LjMwNiAyLjQwMi03LjQ3NCA1LjQzMi0xMS41NTMgOC41NTktNS4yNTggMS44NzMgMi44NDQtMTYuMDgtMi41NjUtMjAuNTcyLTEuOTItNS4zOTQtOC41MjUtNi41MTMtMTMuMDI3LTguOTI0LTkuMDE4LTEuNzgyLTE3LjkyMy4wOTktMjYuNDIgMi40NjctNC43MDIgMS4wMS04Ljg5NiA0LjQ4Ni0xMi45MDUgNi44NzQtMy44MTMgMi42MzUtNy4wMzIgNC4zOTUtMTAuNjI1IDYuNzktLjgzMi04LjE4MSAyLjUxOC0xNS44MjMgMy44MzMtMjMuODM3IDEuMjcyLTUuNjkgMy42MjctMTEuMjE2IDQuNzg5LTE2Ljk3NiAyLjM2NS00LjY2IDMuODk4LTkuNjc4IDUuOTA1LTE0LjI5NiAzLjA0Mi02LjA5NCA1Ljk5NC0xMi4wMTYgOS4wMDItMTguMDIgMi40MDItMy42MTcgNS40NzUtOC4zMDcgOC4xMDMtMTIuMTYzIDIuNzg3LTMuMjc3IDUuMTUzLTYuNzk2IDguNDAyLTkuOTEgMy45MTctMy45MjggNy42MDgtNy45MjEgMTIuMTU0LTEwLjgxMiA0LjE3LTIuOTU0LS45OTQgMTAuMjAxLS4zNDMgMTMuNTY0IDEuMTM2IDUuNzcyIDEuNDM4IDEyLjMxMSA0LjY5NCAxNy4zNyAyLjQ0OCAzLjU1NiA0LjYxNiA2Ljc1NSA3LjY1MiA5LjkxIDYuNSA3LjM2OCAxNC40MyAxMy4xNjUgMjMuMjU3IDE3LjU5MyA0LjkwOCAyLjU2NSAxMC4wOSA0LjI3NCAxNS4zMDUgNS45ODMgOC4yMjIgMS44NDYgMTYuNTYgNC4xNiAyNS4zNTggNC4zNTQgNy42NDYgMi4xNTMgMTUuMzIzIDEuNDYzIDEwLjc0Ni04LjItMy4xMTEtOS44MTEtMy42OTQtMTguNzY1IDMuODA4LTkuMDY4IDMuOTk3IDUuOTQ2IDE4LjA3NCAzLjIyIDE4LjgwOC00Ljc1Ny45MDgtNi4yOTQuMjk1LTE4LjYwMiA3LjY3NiAzLjM5NS0uMTA2IDQuMDUyIDIuNzg3IDguMzQxIDEwLjg4IDUuNDk5IDQuODc5LTIuMDMgNi45NDQtMi4zMSAxMS41NS01LjE4OSAzLjU2Ny0yLjY4NCA3LjEyMS01Ljc3NSAxMC4yLTguNDEzIDUuNjU4LTUuNjU4IDExLjYwMy0xMi4yMTIgMTYuMjA5LTE5LjIxNyAzLjY0OC02Ljg4OCA4LjA2LTE0LjM5OCA4LjgxMi0yMi42MzYgMi40MTQtOC41OC4wMzctMTcuOTU2LTMuMTk5LTI1Ljc2LTYuNzc1LTkuODA0IDcuNTkxLTMuNTQ1IDEyLjU0Mi0zLjU2IDYuNzk1IDEuMjE1IDEzLjM3NSAyLjcwNyAxOS42NTYgNS41ODNhODMuOTg0IDgzLjk4NCAwIDAxMTQuODU0IDYuNDNjNS4zNjcgMi4xMzggMTAuNjg1IDYuMDg5IDE1LjkwNSA5LjAxIDMuNjAzIDIuNDM0IDcuMTY0IDUuMTM4IDEwLjk1MyA3Ljk1OSA0LjQ5NiAzLjM3NSA4LjcwNyA2Ljc0OCAxMi41MyAxMC44NDkgMy40OTcgMS43NTcgNS45NzIgNS40NTggOC45MDMgOC4yMjEgMy40NzcgNC4xMzUgNi45MjcgOC4wMjcgMTAuMTk5IDEyLjAxMy0zLjQ0NC44NjItMTIuNzgtNC4wNC0xOC4zMzUtNS4wMjItOC43MDQtLjYzOC0xNy43LTEuNzUtMjUuNTU2IDIuODE0LTYuNjI3IDEuOTAxLTEyLjM2NyA4LjEtMTMuMDU4IDE1LjEyMi0yLjc1OCA4LjMyNCAxLjQ1MSAxNi4wODIgMy41MDcgMjMuNjg3IDIuNzAxIDQuMjMgNC42NzggOS4wMjYgNi44MDYgMTMuMjUzLTIuODM0LjIyNS04LjY0My00LjUzMS0xMi45OC01LjEwMS02LjUwMi0yLjc2Ny0xNC4yNjQtNC45MTYtMjEuODMtMy40OTMtNS40OTIuOTk3LTkuOTc2IDQuMDEtMTMuNTA1IDguNTk0LTMuMjk3IDYuMDE4LTYuMjMxIDE0LjM1Ny0zLjY5MSAyMS40NiAyLjUyOCA4LjIyNCAxLjQ1MyA5LjQyMy0zLjgxIDMuMDE3LTMuODM1LTQuMDcyLTguNzc1LTYuMDIyLTE0LjEwNS02LjkwOC01LjI0OC0uODM5LTExLjU0NiAxLjQ3LTE1LjAwNSA2LjAwNy03Ljg4MyA2LjY4NS0xMC40MiAxNy4xOTMtMTIuNDEgMjYuNTc5LTMuMTY0IDE0LjktLjQzMyAzMC4yODQgMi4yMDcgNDQuODk4bC0uMyAxLjA1MXptLTMxLjg1Ny0xMDEuNTUyYy0xLjA1LTcuNjA1LTExLjc2NS4xMTMtMi4wNjUgMS4zOTQgMS4wMjMuNDMzIDEuNzg0LS45NzYgMi4wNjUtMS4zOTR6bTcuNTQ5LS44NjhjNS4zNy02LjkyNy0xLjE3MS01LjQxNi0zLjc1MS0xLjQ5Mi0xLjU1NiAzLjAxNSAyLjUzNCAxLjk1IDMuNzUgMS40OTJ6IiBmaWxsPSJ1cmwoI2YpIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg2NTAuNTcyIC04ODEuNjkpIHNjYWxlKDEuNjA4NzEpIi8+PHBhdGggZD0iTS0xNDYuNzI2IDc5Ni4yNGMtMi4xMTItNC40MzEtNC41MTgtMTAuNTk4LTcuMjAyLTE1LjAxNS0zLjAxNS02LjI3Ni03LjM4NS0xMi45ODYtMTIuMDAzLTE3LjgzNS02LjI0Ni03Ljg5My0xNS4yODMtMTMuNzgyLTI0LjcxMi0xNy4wNy04LjU2LTEuMjkyLTE1LjMxNyA1LjE1OS0yMC43NTIgMTAuNzI4LS40NDktNy40NzYgMS42MzItMTYuNTE2LTMuMzQ0LTIzLjA3NS0uODA5LTQuMDk2LTYuMDA4LTUuNjA3LTguMzk3LTcuNzMzLTUuNTY4LTIuNDcyLTExLjc3My0zLjI3Ny0xNy44MTgtMS40NzctNS40NjcgMS40NjQtMTAuNTQyIDMuMjUxLTE1LjQ1NCA2LjQ1Ny00LjMwNiAyLjQwMi03LjQ3NSA1LjQzMi0xMS41NTQgOC41Ni01LjI1OCAxLjg3MyAyLjg0NS0xNi4wOC0yLjU2NC0yMC41NzMtMS45MjEtNS4zOTMtOC41MjUtNi41MTItMTMuMDI3LTguOTIzLTkuMDE5LTEuNzgyLTE3LjkyNC4wOTktMjYuNDIxIDIuNDY2LTQuNzAyIDEuMDEtOC44OTYgNC40ODYtMTIuOTA0IDYuODc1LTMuODE0IDIuNjM1LTcuMDMyIDQuMzk0LTEwLjYyNSA2Ljc5LS44MzMtOC4xODEgMi41MTgtMTUuODIzIDMuODMyLTIzLjgzNyAxLjI3My01LjY5IDMuNjI3LTExLjIxNiA0Ljc5LTE2Ljk3NiAyLjM2NC00LjY2IDMuODk3LTkuNjc4IDUuOTA0LTE0LjI5NiAzLjA0Mi02LjA5NCA1Ljk5NC0xMi4wMTYgOS4wMDMtMTguMDIgMi40MDEtMy42MTcgNS40NzQtOC4zMDcgOC4xMDItMTIuMTYzIDIuNzg3LTMuMjc4IDUuMTU0LTYuNzk2IDguNDAyLTkuOTEgMy45MTctMy45MjggNy42MDgtNy45MjEgMTIuMTU0LTEwLjgxMyA0LjE3LTIuOTUzLS45OTQgMTAuMjAyLS4zNDMgMTMuNTY1IDEuMTM2IDUuNzcyIDEuNDM4IDEyLjMxIDQuNjk0IDE3LjM2OSAyLjQ0OCAzLjU1NiA0LjYxNiA2Ljc1NiA3LjY1MyA5LjkxIDYuNSA3LjM2OSAxNC40MyAxMy4xNjYgMjMuMjU3IDE3LjU5NCA0LjkwNyAyLjU2NSAxMC4wOSA0LjI3NCAxNS4zMDQgNS45ODIgOC4yMjMgMS44NDcgMTYuNTYgNC4xNiAyNS4zNTggNC4zNTUgNy42NDYgMi4xNTMgMTUuMzIzIDEuNDYzIDEwLjc0Ni04LjIwMS0zLjExMS05LjgxLTMuNjkzLTE4Ljc2NCAzLjgwOC05LjA2OCAzLjk5NyA1Ljk0NyAxOC4wNzQgMy4yMjIgMTguODA4LTQuNzU2LjkwOC02LjI5NC4yOTUtMTguNjAyIDcuNjc2IDMuMzk1LS4xMDYgNC4wNTIgMi43ODcgOC4zNCAxMC44OCA1LjQ5OSA0Ljg3OS0yLjAzIDYuOTQ1LTIuMzEgMTEuNTUtNS4xODkgMy41NjctMi42ODUgNy4xMjEtNS43NzUgMTAuMi04LjQxMyA1LjY1OC01LjY1OCAxMS42MDMtMTIuMjEyIDE2LjIwOS0xOS4yMTcgMy42NDgtNi44ODggOC4wNi0xNC4zOTggOC44MTItMjIuNjM2IDIuNDE0LTguNTguMDM3LTE3Ljk1Ny0zLjE5OC0yNS43Ni02Ljc3Ni05LjgwNCA3LjU5LTMuNTQ1IDEyLjU0MS0zLjU2IDYuNzk1IDEuMjE1IDEzLjM3NSAyLjcwNyAxOS42NTYgNS41ODJhODMuOTg0IDgzLjk4NCAwIDAxMTQuODU1IDYuNDMxYzUuMzY2IDIuMTM4IDEwLjY4NCA2LjA4OSAxNS45MDQgOS4wMSAzLjYwMyAyLjQzMyA3LjE2NSA1LjEzOCAxMC45NTQgNy45NTggNC40OTUgMy4zNzYgOC43MDYgNi43NDkgMTIuNTI4IDEwLjg1IDMuNDk4IDEuNzU3IDUuOTczIDUuNDU3IDguOTA0IDguMjIxIDMuNDc4IDQuMTM1IDYuOTI3IDguMDI3IDEwLjE5OSAxMi4wMTMtMy40NDQuODYyLTEyLjc4LTQuMDQtMTguMzM0LTUuMDIzLTguNzA1LS42MzgtMTcuNy0xLjc0OS0yNS41NTcgMi44MTQtNi42MjcgMS45MDItMTIuMzY2IDguMS0xMy4wNTcgMTUuMTIzLTIuNzU5IDguMzI0IDEuNDUgMTYuMDgyIDMuNTA2IDIzLjY4NyAyLjcwMiA0LjIzIDQuNjc5IDkuMDI2IDYuODA2IDEzLjI1My0yLjgzNC4yMjUtOC42NDMtNC41MzItMTIuOTc5LTUuMTAxLTYuNTAzLTIuNzY4LTE0LjI2NS00LjkxNi0yMS44MzEtMy40OTMtNS40OTIuOTk3LTkuOTc2IDQuMDEtMTMuNTA0IDguNTk0LTMuMjk3IDYuMDE4LTYuMjMyIDE0LjM1Ni0zLjY5MiAyMS40NiAyLjUyOSA4LjIyMyAxLjQ1MyA5LjQyMi0zLjgxIDMuMDE2LTMuODM1LTQuMDcyLTguNzc1LTYuMDIxLTE0LjEwNS02LjkwNy01LjI0OC0uODM5LTExLjU0NiAxLjQ3LTE1LjAwNCA2LjAwNi03Ljg4NCA2LjY4NS0xMC40MiAxNy4xOTQtMTIuNDEgMjYuNTgtMy4xNjQgMTQuOS0uNDM0IDMwLjI4NCAyLjIwNyA0NC44OThsLS4zIDEuMDUxem0tMzEuODU2LTEwMS41NTFjLTEuMDUtNy42MDUtMTEuNzY1LjExMi0yLjA2NCAxLjM5MyAxLjAyMy40MzMgMS43ODMtLjk3NiAyLjA2NC0xLjM5M3ptNy41NS0uODY4YzUuMzctNi45MjctMS4xNzItNS40MTYtMy43NTItMS40OTMtMS41NTYgMy4wMTYgMi41MzQgMS45NTEgMy43NTEgMS40OTN6IiBmaWxsPSJ1cmwoI2cpIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg2NTAuNTcyIC04ODEuNjkpIHNjYWxlKDEuNjA4NzEpIi8+PHBhdGggZD0iTTQ3Ny42OCA3OS43NDRjMTIuNDMgMzYuMzk2LTMuODUyIDc2LjE4LTI5LjI1NiAxMDIuOTIyLTE4Ljg4NSAyMi42NjMtNjUuNDQ3IDQxLjkyNS02NS4yNzYgMjUuMjM0LTQuNTU1LjM5Ni0uMjYyLTI2LjExNC02LjY3Ny0xOC4zMTMtNC4wOCAyMS41NC0yNC4wNDIgMjUuNjY4LTM5LjA5MSAxMi4zNCA0LjI2NCA1Ljg0IDE0LjI3IDE2LjcwOSAxLjU4NSAzMS41NjgtMzYuODI1IDUuNzU2LTczLjkwMi00LjMwOS0xMDYuMDQyLTIyLjM3Ny0yNi40ODUtMTYuOTIxLTQ2LjMtNDYuMDI1LTQ3Ljc3Ny03OC4zODctMzYuNTQgNDAuMDctNTkuMjY4IDkxLjQ5LTY4LjAxOSAxNDQuODM0IDI2LjM1Ny0xOS4zODUgNjUuNzg3LTI5Ljk2MSA5My45Ni04LjU0NiA4LjkxIDYuOTkzIDkuMzc3IDE5LjMyNSAxMi4wNjUgMjkuNDYgMjAuODQtMjAuMzI3IDYwLjA1My0yNi4xMiA4MC45MzgtMi44MTYgNC45ODYgOC4zNSA3LjMyNiAyMy4xNDkgMTkuODA3IDIyLjUyMiAyNi4yODUtNi43ODYgNTAuMDY2IDEzLjY1IDY0LjkwMSAzMy4yMyA3Ljc5NyA0LjM1MiAxMy40NjUtNi4xMTUgMTEuOTY1LTEyLjk3LjY4NC0yNC4xNDYgMTEuNTY3LTUwLjgyMiAzMy43ODMtNjIuNzkgMTEuNjU2LTcuODMzIDI1Ljc5Ny40OTkgMzguNTA5LTMuNTctMS44NjMtMzMuOTUgNDQuMDctNTYuODAyIDcwLjE4LTM0Ljg4OSA3LjI0OCAyLjQyOCA3LjUtOC40ODUgMi45MTYtMTEuNDYyLTE1LjU0OC0yNS4xNjItLjg2Mi02NS4yNDMgMzAuMDYyLTY5LjE3NCAxMy43NDktMy40MzYgMjcuODg2LTIuMzc0IDQxLjkyNy0yLjc2NS0zNy45NDUtMzguNzYtODYuOTA1LTY5LjA4MS0xNDEuMTE0LTc3LjAxN2wuMzQ2IDEuNTd6IiBvcGFjaXR5PSIuNDEyIiBmaWxsPSIjZmZkNDJhIi8+PHBhdGggZD0iTTQ4MC4xNTYgNjExLjQ2OWM5LjI2NiAxNy42MzIgMy45NzIgMzkuNTA0LTcuNTMxIDU0LjgxMi05LjkzMiAxNC4wNjgtMjMuMjYzIDI3LjYzNC00MC40MzggMzEuODQ0LTUuNzAzIDEuNDQxLTExLjAwMS0zLjEwOC0xMS41My04Ljc1LS41NjQtMS41NjItMS4zNTItNy41Ni0xLjc4Mi0zLjI4MS0xLjkxMiAxMC45LTE3LjQ1NCAxMy45Mi0yNC4zNzUgNS44NzUtMS45NTEtMi44MjUgMi4yNCA3LjYxOC45OSA0LjU2MiAyLjQ2OSA0Ljc4NCAzLjIzNSAxMy4yMDktMy40NTkgMTQuNjU3LTYuNzcgMS4xOTQtMTMuNDg1LTEuNjQtMjAuMjgxLTEuNzItMjUuNi0zLjgyMi01MS43MjItMTcuMTc0LTY0LjE1Ni00MC41OTMtMy40MzgtNy42OTgtNC43MzMtMTcuMjYtMi43ODEtMjQuOTY5LTI2LjUwNiAyMy4wMDUtMzkuOTU3IDU3LjkwOS00Ni44NDQgOTEuODc1LTIuNzIzIDcuODcyIDMuOTEuNzcxIDcuMjgxLS44NDMgMTIuNzEzLTguMjY5IDI5LjQyOS0xMi4yMTYgNDQuMDk0LTcuMDYzIDguODc0IDIuOTY0IDE1LjI3NyAxMi41MTMgMTIuNDA2IDIxLjgxMy0xLjcwNyA1LjI0My4yMjQgNC40NDggMy41OTQgMS4xODcgMTEuOTU4LTguOTgzIDI5LjE4Mi0xNS4yNyA0My4xODctNy4xMjUgOC42NDYgNS4yNTYgMTIuMTE4IDE2LjA0OSAxMC44NDQgMjUuNzUgNi4zNjUtNy4wMjggMTcuODc4LTkuODQ0IDI2LTQuMTI1IDEzLjkyOCA2LjgyMyAyNC4wMDYgMTkuNDY2IDMxLjE1NiAzMy0yLjI1Mi0xOS43My0uMzczLTQyLjU5NyAxNC01Ny40NjkgNy4yNTktNy42MyAxOS42MjQtOC4xNjggMjcuOTY5LTIuMTU2IDIuNDA4IDEuNzIgNC41NiA0LjAzMSAzLjEyNS0uNDM4LTEuOTI5LTE0LjM4OCA4LjYyNC0yOS44MDcgMjMuNzA2LTMwLjE2NiA5LjE3Ny0uNTk1IDE4LjA4IDMuMTk4IDI2LjEzOCA2LjYwNC02LjQwOC0xMi4xMDctMTIuMzExLTI3Ljg1NC00LjI1LTQwLjUzMSA3LjI0LTEwLjQxMyAyMS41NTUtMTMuNTg5IDMzLjY1Ni0xMi4zNzUgNS4zNDQuNTk0IDEwLjU2MyAxLjkxMSAxNS41OTQgMy43MTgtMjQuNjItMjguMjkyLTU4LjY0NC01MC40MDktOTYuNTYzLTU0LjU2MmwuMjUuNDY5ek00MTcuOTcgNzA1YzUuNDY3LjQzNCA0LjE0OSA4LjA1OC4yNSA5Ljg0NC0xLjk4IDEuNTY0LTUuNTYgMS4wNDMtNi44MTMuMDkzLTIuNjAzIDYuMzQ1LTEzLjcuNDkzLTkuODEyLTUuMjggMi4wOC0zLjI0NSA3LjYzNi0yLjYyMyA5LjQzNy0uNTMyIDEuODMtMS45IDQuMTMzLTMuODg3IDYuOTM4LTQuMTI1eiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTI5OC41MzEgLTkwNy4wMDYpIHNjYWxlKDEuNjA4NzEpIiBjbGlwLXBhdGg9InVybCgjaCkiIGZpbGw9InVybCgjaSkiLz48cGF0aCBkPSJNNDgwLjE1NiA2MTEuNDY5YzkuMjY2IDE3LjYzMiAzLjk3MiAzOS41MDQtNy41MzEgNTQuODEyLTkuOTMyIDE0LjA2OC0yMy4yNjMgMjcuNjM0LTQwLjQzOCAzMS44NDQtNS43MDMgMS40NDEtMTEuMDAxLTMuMTA4LTExLjUzLTguNzUtLjU2NC0xLjU2Mi0xLjM1Mi03LjU2LTEuNzgyLTMuMjgxLTEuOTEyIDEwLjktMTcuNDU0IDEzLjkyLTI0LjM3NSA1Ljg3NS0xLjk1MS0yLjgyNSAyLjI0IDcuNjE4Ljk5IDQuNTYyIDIuNDY5IDQuNzg0IDMuMjM1IDEzLjIwOS0zLjQ1OSAxNC42NTctNi43NyAxLjE5NC0xMy40ODUtMS42NC0yMC4yODEtMS43Mi0yNS42LTMuODIyLTUxLjcyMi0xNy4xNzQtNjQuMTU2LTQwLjU5My0zLjQzOC03LjY5OC00LjczMy0xNy4yNi0yLjc4MS0yNC45NjktMjYuNTA2IDIzLjAwNS0zOS45NTcgNTcuOTA5LTQ2Ljg0NCA5MS44NzUtMi43MjMgNy44NzIgMy45MS43NzEgNy4yODEtLjg0MyAxMi43MTMtOC4yNjkgMjkuNDI5LTEyLjIxNiA0NC4wOTQtNy4wNjMgOC44NzQgMi45NjQgMTUuMjc3IDEyLjUxMyAxMi40MDYgMjEuODEzLTEuNzA3IDUuMjQzLjIyNCA0LjQ0OCAzLjU5NCAxLjE4NyAxMS45NTgtOC45ODMgMjkuMTgyLTE1LjI3IDQzLjE4Ny03LjEyNSA4LjY0NiA1LjI1NiAxMi4xMTggMTYuMDQ5IDEwLjg0NCAyNS43NSA2LjM2NS03LjAyOCAxNy44NzgtOS44NDQgMjYtNC4xMjUgMTMuOTI4IDYuODIzIDI0LjAwNiAxOS40NjYgMzEuMTU2IDMzLTIuMjUyLTE5LjczLS4zNzMtNDIuNTk3IDE0LTU3LjQ2OSA3LjI1OS03LjYzIDE5LjYyNC04LjE2OCAyNy45NjktMi4xNTYgMi40MDggMS43MiA0LjU2IDQuMDMxIDMuMTI1LS40MzgtMS45MjktMTQuMzg4IDguNjI0LTI5LjgwNyAyMy43MDYtMzAuMTY2IDkuMTc3LS41OTUgMTguMDggMy4xOTggMjYuMTM4IDYuNjA0LTYuNDA4LTEyLjEwNy0xMi4zMTEtMjcuODU0LTQuMjUtNDAuNTMxIDcuMjQtMTAuNDEzIDIxLjU1NS0xMy41ODkgMzMuNjU2LTEyLjM3NSA1LjM0NC41OTQgMTAuNTYzIDEuOTExIDE1LjU5NCAzLjcxOC0yNC42Mi0yOC4yOTItNTguNjQ0LTUwLjQwOS05Ni41NjMtNTQuNTYybC4yNS40Njl6TTQxNy45NyA3MDVjNS40NjcuNDM0IDQuMTQ5IDguMDU4LjI1IDkuODQ0LTEuOTggMS41NjQtNS41NiAxLjA0My02LjgxMy4wOTMtMi42MDMgNi4zNDUtMTMuNy40OTMtOS44MTItNS4yOCAyLjA4LTMuMjQ1IDcuNjM2LTIuNjIzIDkuNDM3LS41MzIgMS44My0xLjkgNC4xMzMtMy44ODcgNi45MzgtNC4xMjV6IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjk4LjUzMSAtOTA3LjAwNikgc2NhbGUoMS42MDg3MSkiIGNsaXAtcGF0aD0idXJsKCNoKSIgZmlsbD0idXJsKCNqKSIvPjwvZz48L3N2Zz4=");
            display: inline-block
        }

        #bar,#bat,.shadow,#content,.copyright img {
            filter: drop-shadow(0 0 7px #000)
        }

        #list,.overlay {
            height: calc(100% - 45px)
        }

        #list {
            margin: 12px 0
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
           font-size: 0;
           height: 0px;
           transition: font-size 0.5s ease-in-out, height 0.5s ease-in-out;
         }
  
         #MIT.visible {
           font-size: 16px;
           height: auto;
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
            height: 100%;
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
            margin: 0
        }

        #bat,.overlay,body {
            overflow: auto
        }

        #media img,#media video,body {
            background-size: 100%
        }

        html {
            backface-visibility: hidden;
            transform: translate3D(0,0,0);
            width: 100%
        }

        video::-webkit-media-controls-panel {
            background-image: linear-gradient(transparent,transparent)!important
        }

        #content {
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
                    <div id="bar">
                        <a oncontextmenu="toggleFullScreen()" onclick="window.closeLightbox()">
                            <span id="bat">
                        </a>
                    </div>
                    <div id="content">
                    </div>
                </div>
            </span>
        </div>
    </div>
    <div id="bar">
        <a onClick="window.location.href=window.location.href" oncontextmenu="toggleFullScreen()">
            <span id="bat">
        </a>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Lightbox.js">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Fullscreen.js">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/Copyright.js">
    </script>

</body>
</html>
