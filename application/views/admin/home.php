
    <div class="container-fluid">
      <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <h1 class="mt-3">일일 방문자 현황</h1>

          <!-- 차트 -->
          <canvas id="visitorChart" width="900" height="380"></canvas>

          <!-- 날짜별 접속자 수 테이블 -->
          <h2 class="mt-5">일별 방문자</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>날짜</th>
                  <th>방문자 수</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($daily_visitors as $visitor): ?>
                <tr>
                  <td><?php echo $visitor['visit_date']; ?></td>
                  <td><?php echo $visitor['visitor_count']; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Chart.js 스크립트 -->
    <script>
      // 서버에서 전달된 데이터 PHP에서 자바스크립트로 전달
      const labels = <?php echo json_encode(array_column($daily_visitors, 'visit_date')); ?>;
      const data = <?php echo json_encode(array_column($daily_visitors, 'visitor_count')); ?>;
      
      const ctx = document.getElementById('visitorChart').getContext('2d');
      const visitorChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: labels, // 날짜 라벨
              datasets: [{
                  label: '일일방문자',
                  backgroundColor: 'rgb(75, 192, 192)',
                  borderColor: 'rgb(75, 192, 192)',
                  data: data, // 날짜별 방문자 수
              }]
          },
          options: {
              scales: {
                  x: {
                      title: {
                          display: true,
                          text: ''//날짜 라벨명
                      }
                  },
                  y: {
                      title: {
                          display: true,
                          text: ''//방문자수 라벨명
                      },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1, // Y축 값을 1씩 증가
                            callback: function(value, index, values) {
                                return Math.floor(value); // Y축 값을 정수로 표시
                            }
                        }
                  }
              }
          }
      });
    </script>
</body>

</html>