systems({
  'api': {
    depends: ["postgres"],
    image: {dockerfile: "./Dockerfile-dev"},
    provision: [
      "composer install",
    ],
    workdir: "/azk/#{manifest.dir}",
    shell: "/bin/bash",
    wait: {"retry": 20, "timeout": 1000},
    mounts: {
      "/azk/#{manifest.dir}": sync("."),
      "/azk/#{manifest.dir}/vendor": persistent("vendor-#{manifest.dir}"),
    },
    scalable: {"default": 1},
    http: {
      domains: [ "#{system.name}.#{azk.default_domain}" ]
    },
    ports: {
      // exports global variables
      http: "80/tcp",
    },
    envs: {
    },
  },
  postgres: {
    depends: [],
    image: {"docker": "azukiapp/postgres"},
    shell: "/bin/bash",
    wait: {"retry": 25, "timeout": 1000},
    mounts: {
      '/var/lib/postgresql/data': persistent("postgresql-#{system.name}"),
      '/var/log/postgresql': path("./log/postgresql"),
    },
    ports: {
      // exports global variables
      data: "5432/tcp",
    },
    envs: {
      // set instances variables
      POSTGRES_USER: "contentiic",
      POSTGRES_PASS: "onePasswordUltraSecureHereWololo",
      POSTGRES_DB  : "#{manifest.dir}",
    },
    export_envs: {
      DATABASE_URL: "postgres://#{envs.POSTGRES_USER}:#{envs.POSTGRES_PASS}@#{net.host}:#{net.port.data}/${envs.POSTGRES_DB}",
    },
  },
});

// Sets a default system (to use: start, stop, status, scale)
setDefault("api")
