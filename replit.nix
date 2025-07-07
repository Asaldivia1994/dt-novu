{ pkgs }: {
  deps = [
    pkgs.nodejs_20
    pkgs.php83
    pkgs.composer
    pkgs.postgresql
    pkgs.git
    pkgs.unzip
    pkgs.curl
  ];
}